<?php


class Controller_Api_Phones extends Controller_Template
{
    public $template = 'api';
    public int $maxPhones = 100;

    public function action_add()
    {
        $phones = (array)$this->request->post('phones');
        $columns = ['phone', 'sex', 'age', 'region'];
        $values = [];

        if (count($phones) > $this->maxPhones) {
            return $this->template->content = json_encode(['done' => 0, 'error' => 'Допустимое максимальное кол-во '.$this->maxPhones]);
        }

        foreach ($phones as $phone) {
            if ($this->validatePhones($phone)) {
                $row = [];
                foreach ($columns as $col) {
                    $row[] = $phone[$col];
                }
                $values[] = $row;
            }
        }



        $rowInserted = $values ? (new Model_Phones())->add($columns, $values) : 0;

        return $this->template->content = json_encode(['done' => 1, 'rowInserted' => $rowInserted]);
    }

    public function action_get()
    {
        $filters = (array)$this->request->post('filters');
        $phones = (new Model_Phones())->get(new DTO_Phonefilter($filters));

        return $this->template->content = json_encode(['done' => 1, 'phones' => $phones]);
    }

    public function validatePhones(array $phone): bool
    {
        $valid = new Model_Validate();
        if (!($valid->integer($phone['phone']) && strlen($phone['phone']) == 11)) {
            return false;
        }
        if (!($valid->integer($phone['sex']) && in_array((int)$phone['sex'], [0, 1, 2]))) {
            return false;
        }
        if (!($valid->integer($phone['age']) && $phone['age'] > 14 && $phone['age'] < 150)) {
            return false;
        }
        if (!$valid->max_length($phone['region'], 255)) {
            return false;
        }

        return true;
    }
}
