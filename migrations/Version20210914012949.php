<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210914012949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add user fields for sign-up form';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(171) NOT NULL, ADD last_name VARCHAR(171) NOT NULL, ADD institution VARCHAR(171) DEFAULT NULL, ADD phone VARCHAR(20) NOT NULL, ADD cv LONGTEXT NOT NULL, ADD photo_filename VARCHAR(171) NOT NULL, ADD languages VARCHAR(171) NOT NULL, ADD keywords VARCHAR(171) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP first_name, DROP last_name, DROP institution, DROP phone, DROP cv, DROP photo_filename, DROP languages, DROP keywords');
    }
}
