<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180408162905 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE jam_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_AA7BE8E05E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jam_jar (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, year_of_production_id INT DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL, INDEX IDX_463B822C54C8C93 (type_id), INDEX IDX_463B8226E6A696D (year_of_production_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE production_year (id INT AUTO_INCREMENT NOT NULL, name INT NOT NULL, UNIQUE INDEX UNIQ_609238235E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jam_jar ADD CONSTRAINT FK_463B822C54C8C93 FOREIGN KEY (type_id) REFERENCES jam_type (id)');
        $this->addSql('ALTER TABLE jam_jar ADD CONSTRAINT FK_463B8226E6A696D FOREIGN KEY (year_of_production_id) REFERENCES production_year (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE jam_jar DROP FOREIGN KEY FK_463B822C54C8C93');
        $this->addSql('ALTER TABLE jam_jar DROP FOREIGN KEY FK_463B8226E6A696D');
        $this->addSql('DROP TABLE jam_type');
        $this->addSql('DROP TABLE jam_jar');
        $this->addSql('DROP TABLE production_year');
    }
}
