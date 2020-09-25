<?php
/*
DELIMITER $$
CREATE PROCEDURE insert_emp(IN START INT(10),IN max_num INT(10))
BEGIN
      DECLARE i INT DEFAULT 0;

      ##set autocommit =0 把autocommit设置为0
      set autocommit = 0;
      REPEAT
      SET i= i+ 1;

      INSERT INTO bigdata_two_thousand (`name`,email) VALUES (substring(MD5(RAND()),1,20),substring(MD5(RAND()),1,20));
      UNTIL i= max_num
END REPEAT;
COMMIT;

END $$
*/

use Illuminate\Database\Seeder;

class TwoThousand extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    }
}
