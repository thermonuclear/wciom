<?php


class DTO_Phonefilter
{
    public int $phone;
    public int $phoneLike;
    public int $sex;
    public int $age;
    public string $region;

    public function __construct(array $filters)
    {
        if (isset($filters['phone'])) {
            $this->phone = (int)$filters['phone'];
        }
        if (isset($filters['phoneLike'])) {
            $this->phoneLike = (int)$filters['phoneLike'];
        }
        if (isset($filters['sex'])) {
            $this->sex = (int)$filters['sex'];
        }
        if (isset($filters['age'])) {
            $this->age = (int)$filters['age'];
        }
        if (isset($filters['region'])) {
            $this->region = $filters['region'];
        }
    }
}
