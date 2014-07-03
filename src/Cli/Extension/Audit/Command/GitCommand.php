<?php

/*
 * This file is part of the AUDIT CLI package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Cli\Extension\Audit\Command;

use Ftven\Build\Cli\Extension\Core\Command\Base\AbstractCommand;
use Ftven\Build\Audit\Feature\PhpproAuditFactoryAwareTrait;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class GitCommand extends AbstractCommand
{
    use PhpproAuditFactoryAwareTrait;
    /**
     * @return array
     */
    protected function describe()
    {
        return [
            'name' => 'git',
            'description' => 'Display a summary of Git project history',
            'options' => [
                'authors'  => ['flag' => true, 'description' => 'display authors'],
                'commits'  => ['flag' => true, 'description' => 'display commits'],
                'branches' => ['flag' => true, 'description' => 'display branches'],
                'tags'     => ['flag' => true, 'description' => 'display tags'],
                'counters' => ['flag' => true, 'description' => 'display counters'],
            ],
        ];
    }
    /**
     * @return int|void
     *
     * @throws \RuntimeException
     */
    protected function process()
    {
        $result = $this->executeAudit([
            'analyzers' => [
                'git' => [],
            ],
            'parsers' => [
                'gitJson' => ['filename' => '@git.json'],
            ],
        ]);

        $metrics = $result->getMetrics();

        if (true === $this->option('counters')) {
            $this->outln(
                '<info>%d</info> branches, <info>%d</info> tags, <info>%d</info> commits, <info>%d</info> authors',
                count($metrics['branches']),
                count($metrics['tags']),
                count($metrics['commits']),
                count($metrics['authors'])
            );
        }
        if (true === $this->option('authors')) {
            $authors = $metrics['authors'];
            uasort($authors, function ($a, $b) {
                return $a['commits'] >= $b['commits'] ? -1 : 1;
            });
            foreach(array_values($authors) as $i => $author) {
                $this->outln('%2d. <info>%s</info> %s <comment>%d</comment>', $i + 1, $author['name'], $author['email'], $author['commits']);
            }
        }
        if (true === $this->option('commits')) {
            foreach(array_values($metrics['commits']) as $i => $commit) {
                $this->outln('%s <comment>%s</comment> <info>%s</info> (<comment>%s</comment>)', $commit['date'], $commit['hash'], $commit['subject'], $commit['author']);
            }
        }
        if (true === $this->option('branches')) {
            $branches = $metrics['branches'];
            uasort($branches, function ($a, $b) {
                return strcmp($a['name'], $b['name']);
            });
            foreach(array_values($metrics['branches']) as $i => $branch) {
                $this->outln('<info>%s</info>', $branch['name']);
            }
        }
        if (true === $this->option('tags')) {
            $tags = $metrics['tags'];
            usort($tags, function ($a, $b) {
                if ($a[0] === 'v') {
                    $a = substr($a, 1);
                }
                if ($b[0] === 'v') {
                    $b = substr($b, 1);
                }
                return strcmp($a, $b);
            });
            foreach(array_values($tags) as $tag) {
                $this->outln('<info>%s</info>', $tag);
            }
        }

    }
}