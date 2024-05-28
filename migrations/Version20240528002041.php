<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240528002041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, entity_id INTEGER NOT NULL, category_name VARCHAR(255) NOT NULL, sku VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, shortdesc VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION NOT NULL, link VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, brand VARCHAR(255) DEFAULT NULL, rating SMALLINT DEFAULT NULL, caffeine_type VARCHAR(255) DEFAULT NULL, count INTEGER NOT NULL, flavored VARCHAR(255) DEFAULT NULL, seasonal VARCHAR(255) DEFAULT NULL, in_stock BOOLEAN NOT NULL, facebook SMALLINT DEFAULT NULL, iskcup VARCHAR(255) DEFAULT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product');
    }
}
