<?php

namespace PHPUnit\Commands;

use PHPUnit\Framework\TestCase;
use Tihon\Lesson1\Blog\Commands\Arguments;
use Tihon\Lesson1\Blog\Exception\ArgumentsException;

class ArgumentsTest extends TestCase
{
    public function testItReturnsArgumentsValueByName(): void
    {
    // Подготовка
        $arguments = new Arguments(['some_key' => 123]);
    // Действие
        $value = $arguments->get('some_key');
    // Проверка
        $this->assertEquals(123, $value);
    }

    public function testItThrowsAnExceptionWhenArgumentIsAbsent(): void
    {
    // Подготавливаем объект с пустым набором данных
        $arguments = new Arguments([]);
    // Описываем тип ожидаемого исключения
        $this->expectException(ArgumentsException::class);
    // и его сообщение
        $this->expectExceptionMessage("No such argument: some_key");
    // Выполняем действие, приводящее к выбрасыванию исключения
        $arguments->get('some_key');
    }

    public function argumentsProvider(): iterable
    {
        return [
            ['some_string', 'some_string'], // Тестовый набор
        // Первое значение будет передано
        // в тест первым аргументом,
        // второе значение будет передано
        // в тест вторым аргументом
            [' some_string', 'some_string'], // Тестовый набор №2
            [' some_string ', 'some_string'],
            [123, '123'],
            [12.3, '12.3'],
        ];
    }

    /**
     * @dataProvider argumentsProvider
     * @throws ArgumentsException
     */
    public function testItConvertsArgumentsToStrings(
        $inputValue,
        $expectedValue
    ): void {
    // Подставляем первое значение из тестового набора
        $arguments = new Arguments(['some_key' => $inputValue]);
        $value = $arguments->get('some_key');
    // Сверяем со вторым значением из тестового набора
        $this->assertEquals($expectedValue, $value);
    }
}
// php -dxdebug.mode=coverage vendor/bin/phpunit.bat tests --coverage-html coverage_report --coverage-filter src
// php -n -dzend_extension=xdebug -dxdebug.mode=coverage ./vendor/bin/phpunit --coverage-html coverage_report --coverage-filter src