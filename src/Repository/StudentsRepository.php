<?php

namespace SedData\Repository;

use SedData\Entity\Grade;
use SedData\Entity\School;
use SedData\Entity\Student;
use Doctrine\Common\Collections\ArrayCollection;
use Sunra\PhpSimple\HtmlDomParser;

/**
 * Class StudentsRepository
 * @package SedData\Repository
 */
class StudentsRepository extends BaseRepository
{
    /**
     * @param Grade $grade
     * @return ArrayCollection
     */
    public function getAll(School $school, Grade $grade)
    {
        $data = $this->getData($school, $grade);

        $students = new ArrayCollection();

        foreach ($data as $student) {
            $students->add(
                new Student(
                    $student->children(0)->text(),
                    html_entity_decode($student->children(1)->text()),
                    $student->children(2)->text(),
                    trim($student->children(3)->text()),
                    preg_replace('/^0*/m', '', $student->children(4)->text()),
                    $student->children(5)->text(),
                    $student->children(6)->text(),
                    $student->children(7)->text(),
                    trim($student->children(8)->text()),
                    $student->children(9)->text(),
                    trim($student->children(10)->text())
                )
            );
        }

        return $students;
    }

    /**
     * @param School $school
     * @param Grade $grade
     * @return null|\simplehtmldom_1_5\simple_html_dom_node|\simplehtmldom_1_5\simple_html_dom_node[]
     */
    protected function getData(School $school, Grade $grade)
    {
        $response = $this->getPage($school, $grade);

        $dom = HtmlDomParser::str_get_html((string) $response->getBody());

        $data = $dom->find('tr');
        array_shift($data);

        return $data;
    }

    /**
     * @param School $school
     * @param Grade $grade
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    protected function getPage(School $school, Grade $grade)
    {
        $data = [
            'anoLetivo'=> date('Y'),
            'codigoEscola' => $school->getCode(),
            'codigoTurma' => $grade->getCode(),
            'matricula' => false,
            'visualizar' => true
        ];

        $url = 'NCA/RelacaoAlunosClasse/Visualizar';

        return $this->http->post($url, $data);
    }
}