<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211121025048 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE contact_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE customer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE domain_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE extension_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE extension_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE registry_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE contact (id INT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, email_address VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, zip_code INT NOT NULL, country VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE customer (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE domain (id INT NOT NULL, extension_id INT NOT NULL, customer_id INT NOT NULL, domain_name VARCHAR(255) NOT NULL, registered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, expired_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, expires_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A7A91E0B812D5EB ON domain (extension_id)');
        $this->addSql('CREATE INDEX IDX_A7A91E0B9395C3F3 ON domain (customer_id)');
        $this->addSql('COMMENT ON COLUMN domain.registered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN domain.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN domain.expired_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN domain.expires_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN domain.deleted_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE extension (id INT NOT NULL, extension_type_id INT NOT NULL, registry_id INT NOT NULL, extension VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9FB73D778ABCA2F9 ON extension (extension_type_id)');
        $this->addSql('CREATE INDEX IDX_9FB73D774CB707ED ON extension (registry_id)');
        $this->addSql('CREATE TABLE extension_type (id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE registry (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE domain ADD CONSTRAINT FK_A7A91E0B812D5EB FOREIGN KEY (extension_id) REFERENCES extension (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE domain ADD CONSTRAINT FK_A7A91E0B9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE extension ADD CONSTRAINT FK_9FB73D778ABCA2F9 FOREIGN KEY (extension_type_id) REFERENCES extension_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE extension ADD CONSTRAINT FK_9FB73D774CB707ED FOREIGN KEY (registry_id) REFERENCES registry (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE domain DROP CONSTRAINT FK_A7A91E0B9395C3F3');
        $this->addSql('ALTER TABLE domain DROP CONSTRAINT FK_A7A91E0B812D5EB');
        $this->addSql('ALTER TABLE extension DROP CONSTRAINT FK_9FB73D778ABCA2F9');
        $this->addSql('ALTER TABLE extension DROP CONSTRAINT FK_9FB73D774CB707ED');
        $this->addSql('DROP SEQUENCE contact_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE customer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE domain_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE extension_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE extension_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE registry_id_seq CASCADE');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE domain');
        $this->addSql('DROP TABLE extension');
        $this->addSql('DROP TABLE extension_type');
        $this->addSql('DROP TABLE registry');
    }
}
