<?php

declare(strict_types=1);

namespace App\Api\Application\Service;

final class YoutubeApiService
{
    //https://stackoverflow.com/questions/18953499/youtube-api-to-fetch-all-videos-on-a-channel

    private string $apiKey;
    private string $maxResults;

    public function __construct()
    {
        $this->apiKey = $_ENV['YOUTUBE_API_KEY'];
        $this->maxResults = $_ENV['MAX_SEARCH_RESULTS'];
    }

    public function listChannelsByUsername(string $username): array
    {
        $url = 'channels?part=snippet%2CcontentDetails%2Cstatistics&forUsername=' . $username . '&maxResults=' . $this->maxResults;
        return $this->callApiWithUrl($url);
    }

    public function getPlaylistsByChannelId(string $channelId): array
    {
        $url = 'playlists?part=snippet,contentDetails&channelId=' . $channelId . '&maxResults=' . $this->maxResults;
        return $this->callApiWithUrl($url);
    }

    public function getPlaylistItemsByPlaylistId(string $playlistId): array
    {
        $url = 'playlistItems?part=snippet,contentDetails&playlistId=' . $playlistId . '&maxResults=' . $this->maxResults;
        return $this->callApiWithUrl($url);
    }

    public function getVideoById(string $videoId): array
    {
        $url = 'videos?part=snippet,contentDetails,statistics&id=' . $videoId;
        return $this->callApiWithUrl($url);
    }

    private function callApiWithUrl(string $url)
    {
        return json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/' . $url . '&key=' . $this->apiKey));
    }
}
