<?php

namespace Asi\ClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EspecialidadRepository
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CitaRepository extends EntityRepository
{

    public function findCitaByClinica($clinica)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT c FROM AsiClinicaBundle:Cita c INNER JOIN AsiClinicaBundle:Disponibilidad d WHERE c.idDisponibilidad = d.id AND d.idclinica IN (:clinica) AND d.fecha = :fecha ORDER BY d.fecha ASC')
            ->setParameters(array("clinica" => $clinica, 'fecha' => new \DateTime('today')))
            ->getResult();
    }

	public function findCitaByPacienteAndFecha($paciente, $fecha)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT c FROM AsiClinicaBundle:Cita c INNER JOIN AsiClinicaBundle:Disponibilidad d WHERE c.idDisponibilidad = d.id AND d.fecha = :fecha AND c.idpaciente = :paciente')
            ->setParameters(array("fecha" => $fecha ,"paciente" => $paciente))
            ->getResult();
    }    

}