<?php
namespace Cedtask\EmployeeData\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('employee_designation')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('employee_designation')
            )
                ->addColumn(
                    'designation_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary'  => true,
                        'unsigned' => true,
                    ],
                    'ID'
                )
                ->addColumn(
                    'designation_name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'Designation Name'
                )

                ->setComment('Post Table');
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
