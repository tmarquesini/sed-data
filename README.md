# SED Data

Biblioteca para obter dados de escolas, turmas e alunos no sistema SED, da PRODESP.

**ATENÇÃO!** Esta biblioteca não é uma integração direta com os webservices oferecidos através de convênios pela PRODESP. As informações coletadas por esta biblioteca são obtidas com técnicas de web scrapping, ou seja, a bibliteca navega pelo sistema do usuário extraindo as informações de maneira automatizada.

### Funcionalidades

  - Obter escolas, informando um município
  - Obter escolas, informando um município e a rede de ensino
  - Obter turmas, informando uma escola
  - Obter alunos, informando uma turma

### Pré requisitos

  - PHP 7.0
  - Credenciais de acesso ao SED

### Instalação

Na raiz de seu projeto PHP, execute:

```sh
$ composer require tmarquesini/sed-data:dev-master
```

### Utilização

Crie uma instancia da classe \SedData\Application, informando suas credenciais de acesso ao sistema GDAE:

```php
$sed = new \SedData\Application('usuario', 'senha');
```

**Obtendo as escolas de um município**

Para obter as escolas municipais de um determinado municipio, use:
```php
$schools = $sed->schools->getAll('nome_do_municipio');
```

A função retorna uma coleção de objetos da classe \SedData\Entity\School que pode ser iterada, por exemplo, em uma estrutura foreach. Cada objeto da coleção possui os seguintes métodos:
```php
// obter o código da escola sem formatação (ex. 123456)
$school->getCode(); 

// obter o código da escola com formatação de pontos de milhar (ex. 123.456)
$school->getFormattedCode();

// obter o nome da escola
$school->getName();
```

**Obtendo as turmas de uma escola**

Para obter as turmas de uma determinada escola, use:
```php
$grades = $sed->grades->getAll($school);
```
Onde **$school** é um objeto da classe \SedData\Entity\School que contém o código da escola a ser pesquisada.

A função retorna uma coleção de objetos da classe \SedData\Entity\Grade que pode ser iterada, por exemplo, em uma estrutura foreach. Cada objeto da coleção possui os seguintes métodos:
```php
// obter o código da escola sem formatação (ex. 123456789)
$grade->getCode(); 

// obter o código da escola com formatação de pontos de milhar (ex. 123.456.789)
$grade->getFormattedCode();

// obter o código do tipo de ensino (ex. 14)
$grade->getType();

// obter a descrição do tipo de ensino (ex. ENSINO FUNDAMENTAL DE 9 ANOS para código 14)
$grade->getTypeDescription();

// obter o código período (ex. 1)
$grade->getPeriod();

// obter a descrição do período (ex. MANHÃ para código 1)
$grade->getPeriodDescription();

// obter a série (ex. 1 para 1º ano)
$grade->getSeries();

// obter a classe (ex. A para turma A)
$grade->getClass();

// obter o semestre (ex. 1 para 1º semestre)
$grade->getSemester();

// obter o número de estudantes ativos
$grade->getActiveStudents();
```

**Obtendo os alunos de uma turma**

Para obter os alunos de uma determinada turma, use:
```php
$students = $sed->students->getAll($school, $grade);
```
Onde **$school** é um objeto da classe \SedData\Entity\School e **$grade** é um objeto da classe \SedData\Entity\Grade que contém, respectivamente, o código da escola e o código da turma a serem pesquisadas.

A função retorna uma coleção de objetos da classe \SedData\Entity\Student que pode ser iterada, por exemplo, em uma estrutura foreach. Cada objeto da coleção possui os seguintes métodos:
```php
// obter o número do aluno
$student->getNumber();

// obter o nome do aluno
$student->getStudent();

// obter o Registro de Aluno (RA) sem o dígito
$student->getRa();

// obter o dígito do RA, quando houver
$student->getDigit();

// obter o código do status do aluno, quando houver (ex. T para transferido)
$student->getStatus();
```

### Licença


The MIT License (MIT)

Copyright (c) 2017 Thiago Pavão Marquesini

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.