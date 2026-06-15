<?php
declare(strict_types=1);

function mineacle_config(): array {
    return [
        'site' => [
            'name' => 'Mineacle Network',
            'ip' => getenv('SERVER_IP') ?: 'mineacle.net',
            'discord' => getenv('DISCORD_URL') ?: 'https://discord.gg/VwbwWftefM',
            'x' => getenv('X_URL') ?: 'https://x.com/mineaclenetwork',
            'store' => getenv('STORE_URL') ?: 'https://store.mineacle.net',
            'vote' => getenv('VOTE_URL') ?: 'https://vote.mineacle.net',
            'bans' => getenv('BANS_URL') ?: 'https://bans.mineacle.net',
            'server_online' => strtolower((string) getenv('SERVER_ONLINE')) !== 'false',
        ],

        'vote_sites' => [
            [
                'name' => 'Minecraft Server List',
                'url' => getenv('VOTE_SITE_1') ?: 'https://minecraft-server-list.com/server/520903/',
                'reward' => 'Vote Key',
            ],
            [
                'name' => 'MinecraftServers.org',
                'url' => getenv('VOTE_SITE_2') ?: 'https://minecraftservers.org/server/688676',
                'reward' => 'Vote Key',
            ],
            [
                'name' => 'Minecraft-MP',
                'url' => getenv('VOTE_SITE_3') ?: 'https://minecraft-mp.com/server-s359207',
                'reward' => 'Vote Key',
            ],
        ],
    ];
}

function h(mixed $value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
