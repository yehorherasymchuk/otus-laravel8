<?php

namespace App\Console\Commands\Users;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class UsersList extends Command
{
    protected $signature = 'users:list {--admin}';

    protected $description = 'List Users';

    public function handle(): void
    {
        $users = $this->getUsers();
        $headers = [
            'ID',
            'Full Name',
            'Email',
        ];
        $data = $users->map(fn(User $user) => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ])->toArray();

        $this->table($headers, $data);

    }

    /**
     * @return Collection|User[]
     */
    private function getUsers(): Collection
    {
        $qb = User::query();
        if ($this->option('admin')) {
            $qb->where('level', User::LEVEL_ADMIN);
        }
        return $qb->get();
    }
}
