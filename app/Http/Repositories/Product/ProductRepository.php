<?php


namespace App\Http\Repositories\Product;


use App\Http\Models\Product\ProductModel;
use App\Http\Repositories\Product\Models\ProductFilterModel;
use DateTime;
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
        $startMonth = date('m', strtotime($productFilterModel->getStartDate()));
        $startDate = new DateTime($productFilterModel->getStartDate());
        $endDate = new DateTime($productFilterModel->getEndDate());

        $seasonKey = 'low';
        if ($startMonth >= self::JUNE && $startMonth <= self::AUGUST) {
            $seasonKey = 'high';
        }

        $numberOfDays = $endDate->diff($startDate)->format("%a");

        $productsArray = DB::table('products')
            ->leftJoin('price_products', 'products.id', '=', 'price_products.product_id')
            ->whereIn('season_id', function ($query) use ($seasonKey) {
                $query
                    ->select('seasons.id')
                    ->from('seasons')
                    ->where('key', '=', $seasonKey);
            })
            ->where('number_of_days', '=', $numberOfDays)
            ->get();

        return $this->mapFromArrayToModelArray($productsArray->toArray(), $numberOfDays);
    }

    /**
     * @param array $data
     * @param int $numberOfDays
     *
     * @return \App\Http\Models\Product\ProductModel[]
     */
    private function mapFromArrayToModelArray(array $data, int $numberOfDays): array
    {
        $productModelArray = [];
        foreach ($data as $item) {
            $productModel = new ProductModel();
            $productModel->fromArray((array)$item);
            $productModel->setNumberOfDays($numberOfDays);

            $productModelArray[] = $productModel->toArray();
        }

        return $productModelArray;
    }
}
