<?php
declare(strict_types = 1);

use Migrations\AbstractMigration;

class CreateSessions extends AbstractMigration
{

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * @return void
     */
    public function up()
    {
        $sql = <<<___SQL___

CREATE TABLE `sessions` (

    `id`       CHAR(40) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
    `created`  DATETIME         DEFAULT CURRENT_TIMESTAMP,
    `modified` DATETIME         DEFAULT CURRENT_TIMESTAMP
                              ON UPDATE CURRENT_TIMESTAMP,
    `data`     BLOB             DEFAULT NULL,
    `expires`  INT(10) UNSIGNED DEFAULT NULL,

  PRIMARY KEY (`id`)

)

  ENGINE=InnoDB
  DEFAULT CHARSET=utf8;

___SQL___;

        parent::execute($sql);
    }

    public function down()
    {
        parent::dropTable('sessions');
    }
}
