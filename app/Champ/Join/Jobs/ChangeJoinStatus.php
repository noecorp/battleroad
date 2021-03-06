<?php

namespace Champ\Join\Jobs;

use Battleroad\Jobs\Job;
use Champ\Join\Repositories\JoinRepository;

class ChangeJoinStatus extends Job
{
    /**
     * @var int
     */
    public $joinId;

    /**
     * @var int
     */
    public $statusId;

    /**
     * Bcash status.
     *
     * @var array
     */
    protected $status = [
        'Em andamento' => 2,
        'Aprovada' => 3,
        'Concluída' => 4,
        'Disputa' => 5,
        'Devolvida' => 6,
        'Cancelada' => 7,
        'Chargeback' => 8,
    ];

    /**
     * @param $joinId
     * @param $status
     */
    public function __construct($joinId, $status)
    {
        $this->joinId = $joinId;
        $this->statusId = $this->status[$status];
    }

    /**
     * Execute the job.
     *
     * @param JoinRepository $joinRepository
     *
     * @return \Champ\Join\Join
     */
    public function handle(JoinRepository $joinRepository)
    {
        $join = $joinRepository->find($this->joinId);

        $join->changeStatus($this->statusId);

        $joinRepository->save($join);

        return $join;
    }
}
