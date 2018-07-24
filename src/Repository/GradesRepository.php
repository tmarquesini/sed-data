<?php

namespace SedData\Repository;

use SedData\Entity\Grade;
use SedData\Entity\School;
use Doctrine\Common\Collections\ArrayCollection;
use Sunra\PhpSimple\HtmlDomParser;

/**
 * Class GradesRepository
 * @package SedData\Repository
 */
class GradesRepository extends BaseRepository
{
    /**
     * @param School $school
     * @return ArrayCollection
     */
    public function getAll(School $school)
    {
        $data = $this->getData($school);

        $grades = new ArrayCollection();

        foreach ($data as $grade) {
            $grades->add(
                new Grade(
                    $this->extractCode($grade->children(0)->children(0)->onclick),
                    $grade->children(1)->text(),
                    html_entity_decode($grade->children(4)->text()),
                    html_entity_decode($grade->children(5)->text()),
                    $grade->children(9)->text(),
                    $grade->children(10)->text(),
                    $grade->children(11)->text(),
                    $grade->children(12)->text(),
                    $grade->children(13)->text(),
                    $grade->children(14)->text()
                )
            );
        }

        return $grades;

    }

    /**
     * @param School $school
     * @return null|\simplehtmldom_1_5\simple_html_dom_node|\simplehtmldom_1_5\simple_html_dom_node[]
     */
    protected function getData(School $school)
    {
        $response = $this->getPage($school);

        $dom = HtmlDomParser::str_get_html((string) $response->getBody());

        $data = $dom->find('tr');
        array_shift($data);

        return $data;
    }

    /**
     * @param School $school
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getPage(School $school)
    {
        $data = [
            'anoLetivo' => date('Y'),
            'codigoEscola' => $school->getCode(),
            'numeroClasse' => '',
            'tipoPesquisa' => 1,
        ];

        $url = 'NCA/RelacaoAlunosClasse/PesquisaTurma';

        return $this->http->post($url, $data);
    }

    /**
     * @param string $html
     * @return bool
     */
    public function extractCode(string $html)
    {
        $re = '/Visualizar\(\d+, \d+, (\d+)\)/m';
        preg_match($re, $html, $result);

        if ($result != false) {
            return $result[1];
        }

        return false;
    }
}
