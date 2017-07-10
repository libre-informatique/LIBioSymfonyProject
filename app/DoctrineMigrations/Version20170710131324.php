<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170710131324 extends AbstractMigration implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'d474c5df-49fa-460b-8951-dafff97bbfc4\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Client\' WHERE id = \'15af43f3-d41a-4b41-aca5-3e606af348d3\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Client\' WHERE id = \'19c612b4-5057-4b68-9ab1-c6f037325c2a\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Client\' WHERE id = \'30405c5a-92ee-4307-9272-933df540207c\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Client\' WHERE id = \'aeef530e-63d7-4c9c-9904-5bb5c0913d44\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Client\' WHERE id = \'fa1c96e1-8771-4c19-bd69-a81129c1d6e5\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Client\' WHERE id = \'8afb9575-4194-4b2b-aac7-3f80534d97a4\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'568ced20-9356-4406-9bec-79d9a6ddb364\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Client\' WHERE id = \'d43330ff-b35e-4e9a-9386-ede38a9bac3c\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Client\' WHERE id = \'30db8307-c998-49d9-8b94-79c4ef47125c\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Fournisseur\' WHERE id = \'d7418a43-0ec2-4a5f-a007-ca609266e3ca\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'24c6a133-ffa2-4546-8bfc-7c1c3b2fe5df\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'f4a3c026-6787-430f-a821-c1ca6a4a7056\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Fournisseur\' WHERE id = \'b70c9588-2c17-4ccb-8bce-ae943da81d0b\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'58cbfc7b-cf37-4bce-849d-43b23eff8d75\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'34cf030b-9a84-4e79-acf6-082968b7aa16\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Client\' WHERE id = \'c904af0e-53b0-4f84-bfec-f907873831fa\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'3046da7a-b373-4969-80cd-a06e609ec957\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'a6ffd7cc-33be-4ae6-9475-c1bc736863e5\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'4e319aff-0f32-4bcd-a4f0-655ce84381c8\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'21f63609-f86c-43fc-a720-59d764d9bf79\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'9c401554-b5f0-4ade-9760-172e320ca25a\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'f3b959e9-9904-4de2-ae0b-fe2ede88e422\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'79e7b5c1-1ab3-4ea4-8273-134493d93cd2\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'d31cb244-bee4-43a3-ad74-988598d49ca2\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'7e690a34-2a07-401b-9e49-e7f2e3d3f2c0\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Autres\' WHERE id = \'37630a06-b4bd-4659-929e-b6af10d70abc\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = \'Producteur\' WHERE id = \'b907691c-963f-4a7c-9098-5a95335cf21d\';');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needsGenerateCommand
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'d474c5df-49fa-460b-8951-dafff97bbfc4\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'15af43f3-d41a-4b41-aca5-3e606af348d3\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'19c612b4-5057-4b68-9ab1-c6f037325c2a\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'30405c5a-92ee-4307-9272-933df540207c\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'aeef530e-63d7-4c9c-9904-5bb5c0913d44\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'fa1c96e1-8771-4c19-bd69-a81129c1d6e5\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'8afb9575-4194-4b2b-aac7-3f80534d97a4\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'568ced20-9356-4406-9bec-79d9a6ddb364\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'d43330ff-b35e-4e9a-9386-ede38a9bac3c\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'30db8307-c998-49d9-8b94-79c4ef47125c\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'d7418a43-0ec2-4a5f-a007-ca609266e3ca\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'24c6a133-ffa2-4546-8bfc-7c1c3b2fe5df\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'f4a3c026-6787-430f-a821-c1ca6a4a7056\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'b70c9588-2c17-4ccb-8bce-ae943da81d0b\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'58cbfc7b-cf37-4bce-849d-43b23eff8d75\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'34cf030b-9a84-4e79-acf6-082968b7aa16\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'c904af0e-53b0-4f84-bfec-f907873831fa\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'3046da7a-b373-4969-80cd-a06e609ec957\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'a6ffd7cc-33be-4ae6-9475-c1bc736863e5\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'4e319aff-0f32-4bcd-a4f0-655ce84381c8\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'21f63609-f86c-43fc-a720-59d764d9bf79\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'9c401554-b5f0-4ade-9760-172e320ca25a\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'f3b959e9-9904-4de2-ae0b-fe2ede88e422\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'79e7b5c1-1ab3-4ea4-8273-134493d93cd2\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'d31cb244-bee4-43a3-ad74-988598d49ca2\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'7e690a34-2a07-401b-9e49-e7f2e3d3f2c0\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'37630a06-b4bd-4659-929e-b6af10d70abc\';');
        $this->addSql('UPDATE librinfo_crm_circle SET type = NULL WHERE id = \'b907691c-963f-4a7c-9098-5a95335cf21d\';');
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param ContainerInterface container
     *
     * @return self
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;

        return $this;
    }
}
