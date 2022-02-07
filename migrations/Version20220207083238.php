<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220207083238 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE study_user (study_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_F24B3E70E7B003E9 (study_id), INDEX IDX_F24B3E70A76ED395 (user_id), PRIMARY KEY(study_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE study_user ADD CONSTRAINT FK_F24B3E70E7B003E9 FOREIGN KEY (study_id) REFERENCES study (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE study_user ADD CONSTRAINT FK_F24B3E70A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE study DROP FOREIGN KEY FK_E67F9749C32A47EE');
        $this->addSql('DROP INDEX IDX_E67F9749C32A47EE ON study');
        $this->addSql('ALTER TABLE study DROP school_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE study_user');
        $this->addSql('ALTER TABLE study ADD school_id INT DEFAULT NULL, CHANGE location location VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE study ADD CONSTRAINT FK_E67F9749C32A47EE FOREIGN KEY (school_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E67F9749C32A47EE ON study (school_id)');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE firstname firstname VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lastname lastname VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phone phone VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
