<?php


namespace App\Http\Models;


class BaseModel implements ModelInterface
{
    protected $propertyNames = [];

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data): self
    {
        foreach ($data as $fieldName => $value) {
            if (in_array($fieldName, $this->propertyNames) && $value !== null) {
                if (is_array($value)) {
                    foreach ($value as $child) {
                        $model = new $child['classType'];
                        $model->fromArray($child);
                        $this->$fieldName[] = $model;
                    }
                    continue;
                }
                $this->$fieldName = $value;
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        foreach ($this->propertyNames as $propertyName) {

            if (is_array($this->$propertyName)) {
                foreach ($this->$propertyName as $childProperty) {
                    if ($childProperty instanceof ModelInterface) {
                        $childProperty = $childProperty->toArray();
                    }

                    $data[$propertyName][] = $childProperty;
                }
                continue;
            }

            $data[$propertyName] = $this->$propertyName;
        }

        return $data;
    }
}
