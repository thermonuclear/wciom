<?php


class Model_Phones extends Model
{
    public Database $db;

    public function __construct()
    {
        $this->db = Database::instance();
    }

    /**
     * Добавление одной либо более одной записи
     * @param array $columns столбцы
     * @param array $values список телефонов
     *
     * @return int кол-во добавленных строк
    */
    public function add(array $columns, array $values): int
    {
        $rows = [];
        foreach ($values as $i => $row) {
            $rows[] = $this->db->quote($row);
        }
        $sql = 'INSERT IGNORE INTO phones ('.join(', ', $columns).') VALUES ';
        $sql .= join(', ', $rows);

        return (int)DB::query(null, $sql)->execute();
    }

    public function get(DTO_Phonefilter $filters, $offset = 0, $limit = 100): array
    {
        $sql = DB::select()->from('phones');
        if (isset($filters->phone)) {
            $sql->where('phone', '=', $filters->phone);
        }
        if (isset($filters->phoneLike)) {
            $sql->where('phone', 'LIKE', "%{$filters->phoneLike}%");
        }
        if (isset($filters->sex)) {
            $sql->where('sex', '=', $filters->sex);
        }
        if (isset($filters->age)) {
            $sql->where('age', '=', $filters->age);
        }
        if (isset($filters->region)) {
            $sql->where('region', '=', $filters->region);
        }
        $sql->offset($offset)->limit($limit);

        return (array)$sql->execute()->as_array();
    }
}
