<?php  /* CalculadoraTest.php */
use PHPUnit\Framework\TestCase;
use Calculadora;

class CalculadoraTest extends TestCase
{  // El nombre de las funciones de pruebas debe comenzar por test*

    public function testSumar()
    {
        $cal = new Calculadora();
        $this->assertEquals(6, $cal->sumar(2, 4), '2+4 debe dar 6');
        $this->assertEquals(7, $cal->sumar(2, 5), '2+5 debe dar 7');
        // Error
        $this->assertEquals(9, $cal->sumar(2, 6), '2+6 debe dar 8');
    }

    public function testRestar()
    {
        $cal = new Calculadora();
        $this->assertEquals(3, $cal->restar(5, 2), '5-2 debe dar 3');
        $this->assertEquals(4, $cal->restar(8, 4), '8-4 debe dar 4');
        // Error
        $this->assertEquals(45, $cal->restar(50, 6), '50-6 debe dar 44');
    }

    public function testMultiplicar()
    {
        $cal = new Calculadora();
        $this->assertEquals(10, $cal->multiplicar(5, 2), '5*2 debe dar 10');
        $this->assertEquals(15, $cal->multiplicar(5, 3), '5*3 debe dar 15');
        // Error
        $this->assertEquals(20, $cal->multiplicar(5, 6), '5*6 debe dar 30');
    }

    public function testDividir()
    {
        $cal = new Calculadora();
        $this->assertEquals(5, $cal->dividir(10, 2), '10/2 debe dar 5');
        $this->assertEquals(10, $cal->dividir(20, 2), '20/2 debe dar 10');
        // Error
        $this->assertEquals(17, $cal->dividir(12, 2), '12/2 debe dar 6');
    }
}
?>