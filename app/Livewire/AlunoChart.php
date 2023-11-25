<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AlunoResposta;
use App\Models\Operacao;
// use App\Models\Operacao;
// use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;

class AlunoChart extends Component
{
    public $ids = [];
    public $operacoes;
    public $active;
    private $chartColumn;
    private $pieChart;

    public $colors = [
        '#008FFB',
        '#00E396',
        '#FEB019',
        '#775DD0',
        '#FAB1B2',
        '#7FD9EB',
    ];

    public function mount($ids, $operacoes)
    {
        $this->ids = $ids;
        $this->operacoes = $operacoes;
        $this->initCharts();
    }

    public function clickAll()
    {
        $this->active = 'all';
        $title = 'Quantidade de questões resolvidas';

        $this->chartColumn = $this->baseChart(new ColumnChartModel(), $title);
        foreach ($this->operacoes as $i => $m) {
            $total = AlunoResposta::whereIn('aluno_id', $this->ids)->where('operacao_id', $m->id)->count();
            $this->chartColumn->addColumn($m->nome, $total, $this->colors[$i]);
        }

        $this->pieChart = $this->baseChart(new PieChartModel(), $title);
        foreach ($this->operacoes as $i => $m) {
            $total = AlunoResposta::whereIn('aluno_id', $this->ids)->where('operacao_id', $m->id)->count();
            $this->pieChart->addSlice($m->nome, $total, $this->colors[$i]);
        }
    }

    public function clickPorOperador($operadorId, $title)
    {
        $this->active = $operadorId;
        $title = 'Resultados da operador: ' . $title;

        $acertou = AlunoResposta::whereIn('aluno_id', $this->ids)
            ->where('operacao_id', $operadorId)
            ->where('acerto', true)
            ->count();

        $errou = AlunoResposta::whereIn('aluno_id', $this->ids)
            ->where('operacao_id', $operadorId)
            ->where('acerto', false)
            ->count();

        $this->chartColumn = $this->baseChart(new ColumnChartModel(), $title);
        $this->chartColumn->addColumn("Erros", $errou, $this->colors[0]);
        $this->chartColumn->addColumn("Acertos", $acertou, $this->colors[1]);

        $this->pieChart = $this->baseChart(new PieChartModel(), $title);
        $this->pieChart->addSlice("Erros", $errou, $this->colors[0]);
        $this->pieChart->addSlice("Acertos", $acertou, $this->colors[1]);
    }

    public function initCharts()
    {
        $title = 'Quantidade de questões resolvidas';

        $this->chartColumn = $this->baseChart(new ColumnChartModel(), $title);
        $this->pieChart = $this->baseChart(new PieChartModel(), $title);
    }

    public function baseChart($chartModel, $title)
    {
        $chart = $chartModel
            ->setTitle($title)
            ->withDataLabels()
            ->withLegend()
            ->setAnimated(true);

        return $chart;
    }

    public function render()
    {
        return view('livewire.aluno-chart')->with([
            'chartColumn' => $this->chartColumn,
            'pieChart' => $this->pieChart,
        ]);
    }
}
