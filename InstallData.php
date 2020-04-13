<?php
namespace Cedtask\EmployeeData\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            ['emp_name' => 'Abhishek Gupta','email' => 'abhishek@gmail.com','salary' => '15200.00',
                'address' => 'Rajaji puram lucknow','age' =>'25','designation_id' => '1','status' => '0'],
            ['emp_name' => 'Jhon','email' => 'john@gmail.com','salary' => '25200.00',
                'address' => 'New York','age' =>'27','designation_id' => '2','status' => '0']
        ];

        $data1 = [
            ['designation_name' => 'Software Developer'],
            ['designation_name' => 'Web Developer']

        ];
        foreach ($data1 as $bind) {
            $setup->getConnection()
                ->insertForce($setup->getTable('employee_designation'), $bind);
        }
        foreach ($data as $bind) {
            $setup->getConnection()
                ->insertForce($setup->getTable('employee'), $bind);
        }
    }
}
