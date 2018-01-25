<?php

namespace Beeriouslymigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version002 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql("CREATE TABLE `grain_type` (
  `id` VARCHAR(50) NOT NULL,
  `description` VARCHAR(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        $this->addSql("INSERT INTO `grain_type` (`id`, `description`)
VALUES
	('48741ff0-dcb1-4b1d-83c7-7e4cc142ff44', 'Lightly Kilned and Toasted Grains'),
	('660e8578-b0ba-4b09-adfa-a3919f3552be', 'Caramel & Crystal Malted Grains'),
	('6b1dcdc1-5c98-443f-b40a-258c2f99f7bc', 'Bulk Brewing Grains'),
	('cc8a2041-40c6-4a15-996c-9afa1a761c57', 'Flaked & Unmalted Adjunct Grains'),
	('fd9931d1-ab6c-4db9-8778-ace7f7692839', 'Domestic Base Malt');
");

        $this->addSql("CREATE TABLE `grain` (
  `id` VARCHAR(50) NOT NULL,
  `grain_type_id` VARCHAR(50) NOT NULL DEFAULT '',
  `name` VARCHAR(100) NOT NULL DEFAULT '',
  `lovibond` DECIMAL(7,2) NOT NULL,
  `lintner` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        $this->addSql("INSERT INTO `grain` (`id`, `grain_type_id`, `name`, `lovibond`, `lintner`)
VALUES
	('c9fe257d-ef6e-47ac-8c5f-ffd328147c78', 'fd9931d1-ab6c-4db9-8778-ace7f7692839', '2-Row Malt', 1.70, 140),
	('0b2b7a06-47c6-4bd8-811f-fe0e688eec46', 'fd9931d1-ab6c-4db9-8778-ace7f7692839', '6-Row Malt', 1.70, 160),
	('9bb2c530-b6e4-4d38-9fa1-b7e8ee7aefbc', '660e8578-b0ba-4b09-adfa-a3919f3552be', 'Briess Caramel 20L', 20.00, 0),
	('8934b1be-db32-431b-9c26-b1f9184c5ce8', '660e8578-b0ba-4b09-adfa-a3919f3552be', 'Briess Caramel 40L', 40.00, 0),
	('05c86123-e79a-4b19-bffa-6a816b8fcfac', '660e8578-b0ba-4b09-adfa-a3919f3552be', 'Briess Caramel 60L', 60.00, 0),
	('37474bd6-4d7c-4fc8-bd4d-8bf2dfc53857', 'fd9931d1-ab6c-4db9-8778-ace7f7692839', 'Pale Ale Malt', 3.00, 50),
	('86a610d3-76fa-45cf-b951-632fc691ef8e', 'fd9931d1-ab6c-4db9-8778-ace7f7692839', 'Premium Pilsner Malt', 1.50, 110),
	('75329bf8-abc3-4a1e-bda5-9acb778e2ee5', 'fd9931d1-ab6c-4db9-8778-ace7f7692839', 'Winter Wheat', 3.50, 0),
	('7dd325ec-9db8-4746-a7d9-bf5977811e05', 'fd9931d1-ab6c-4db9-8778-ace7f7692839', 'Marris Otter Pale Malt', 3.50, 120),
	('1c1d4b6b-c743-43c2-8833-d6cce396058f', 'cc8a2041-40c6-4a15-996c-9afa1a761c57', 'Rolled Oats', 3.00, 0);
");


    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
