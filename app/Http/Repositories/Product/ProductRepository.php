<?php


namespace App\Http\Repositories\Product;


use App\Http\Models\Product\ProductModel;
use App\Http\Repositories\Product\Models\ProductFilterModel;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    private const JUNE = '06';
    private const AUGUST = '08';

    /**
     * @param \App\Http\Repositories\Product\Models\ProductFilterModel $productFilterModel
     *
     * @return \App\Http\Models\Product\ProductModel[]
     */
    public function getProductsByDate(ProductFilterModel $productFilterModel): array
    {
        $seasonKey = 'low';
        $startDate = $productFilterModel->getStartDate();
        if ($startDate >= self::JUNE && $startDate <= self::AUGUST) {
            $seasonKey = 'high';
        }

        $productsArray = DB::table('products')
            ->leftJoin('price_products', 'products.id', '=', 'price_products.product_id')
            ->whereIn('season_id', function ($query) use ($seasonKey) {
                $query
                    ->select('seasons.id')
                    ->from('seasons')
                    ->where('key', '=', $seasonKey);
            })
            ->where('number_of_days', '=', '1')
            ->get();

        return $this->mapFromArrayToModelArray($productsArray->toArray());
    }

    /**
     * @param array $data
     *
     * @return \App\Http\Models\Product\ProductModel[]
     */
    private function mapFromArrayToModelArray(array $data): array
    {
        $productModelArray = [];
        foreach ($data as $item) {
            $productModel = new ProductModel();
            $productModel->fromArray((array)$item);

            $productModelArray[] = $productModel->toArray();
        }

        return $productModelArray;
    }
}
