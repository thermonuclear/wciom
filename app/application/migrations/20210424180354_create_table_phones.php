<?php

use Phinx\Migration\AbstractMigration;

class CreateTablePhones extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('phones', ['comment' => 'Телефоны', 'signed' => false]);
        $table
            ->addColumn('phone', 'string', ['comment' => 'Номер телефона', 'limit' => 11])
            ->addColumn('sex', 'integer', ['comment' => 'Пол: 0 - не задан, 1 - мужской, 2 - женский', 'signed' => false, 'default' => 0])
            ->addColumn('age', 'integer', ['default' => 0, 'comment' => 'Возраст'])
            ->addColumn('region', 'string', ['default' => '', 'comment' => 'Регион проживания'])
            ->addIndex(['phone'], ['unique' => true])
            ->addIndex(['sex'])
            ->addIndex(['age'])
            ->addIndex(['region'], ['limit' => 8])
            ->create()
        ;
    }

    public function down()
    {
        $this->table('phones')->drop();
    }
}
