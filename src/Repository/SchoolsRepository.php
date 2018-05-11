<?php

namespace SedData\Repository;

use SedData\Entity\School;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class SchoolsRepository
 * @package SedData\Repository
 */
class SchoolsRepository extends BaseRepository
{
    /**
     * @return ArrayCollection
     */
    public function getAll()
    {
        $data = $this->getData();

        $schools = new ArrayCollection();

        foreach($data as $school) {
            $code = $school->Value;
            $name = $this->extractSchoolName($school->Text);

            $schools->add(
                new School($code, $name)
            );
        }

        return $schools;
    }

    /**
     * @return mixed
     */
    protected function getData()
    {
        $response = $this->getPage();

        $data = json_decode((string) $response->getBody());

        return $data;
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    protected function getPage()
    {
        $data = [
            'diretoria' => 24536,
            'municipio' => 9501,
            'redeEnsino' => null,
            'situacaoFuncionamentoEscola' => 1
        ];

        $url = 'nca/RelacaoAlunosClasse/DropDownEscolasCIEJson' . '?' . http_build_query($data);

        return $this->http->get($url);
    }

    /**
     * @param string $text
     * @return bool|string
     */
    protected function extractSchoolName(string $text)
    {
        $startNamePosition = strpos($text, ' - ') + 3;

        return substr($text, $startNamePosition);
    }
}
