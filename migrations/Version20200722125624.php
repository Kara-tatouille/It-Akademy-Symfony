<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722125624 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advert DROP FOREIGN KEY FK_54F1F40B6F02CCC5');
        $this->addSql('CREATE TABLE advert_kind (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE advert_type');
        $this->addSql('DROP INDEX IDX_54F1F40B6F02CCC5 ON advert');
        $this->addSql('ALTER TABLE advert CHANGE advert_type_id advert_kind_id INT NOT NULL');
        $this->addSql('ALTER TABLE advert ADD CONSTRAINT FK_54F1F40B9A2E6CFF FOREIGN KEY (advert_kind_id) REFERENCES advert_kind (id)');
        $this->addSql('CREATE INDEX IDX_54F1F40B9A2E6CFF ON advert (advert_kind_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advert DROP FOREIGN KEY FK_54F1F40B9A2E6CFF');
        $this->addSql('CREATE TABLE advert_type (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE advert_kind');
        $this->addSql('DROP INDEX IDX_54F1F40B9A2E6CFF ON advert');
        $this->addSql('ALTER TABLE advert CHANGE advert_kind_id advert_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE advert ADD CONSTRAINT FK_54F1F40B6F02CCC5 FOREIGN KEY (advert_type_id) REFERENCES advert_type (id)');
        $this->addSql('CREATE INDEX IDX_54F1F40B6F02CCC5 ON advert (advert_type_id)');
    }
}
