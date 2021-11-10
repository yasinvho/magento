<?php
namespace Aws\ChimeSDKMessaging;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Chime SDK Messaging** service.
 * @method \Aws\Result batchCreateChannelMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateChannelMembershipAsync(array $args = [])
 * @method \Aws\Result createChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelAsync(array $args = [])
 * @method \Aws\Result createChannelBan(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelBanAsync(array $args = [])
 * @method \Aws\Result createChannelMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelMembershipAsync(array $args = [])
 * @method \Aws\Result createChannelModerator(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelModeratorAsync(array $args = [])
 * @method \Aws\Result deleteChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelAsync(array $args = [])
 * @method \Aws\Result deleteChannelBan(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelBanAsync(array $args = [])
 * @method \Aws\Result deleteChannelMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelMembershipAsync(array $args = [])
 * @method \Aws\Result deleteChannelMessage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelMessageAsync(array $args = [])
 * @method \Aws\Result deleteChannelModerator(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelModeratorAsync(array $args = [])
 * @method \Aws\Result describeChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelAsync(array $args = [])
 * @method \Aws\Result describeChannelBan(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelBanAsync(array $args = [])
 * @method \Aws\Result describeChannelMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelMembershipAsync(array $args = [])
 * @method \Aws\Result describeChannelMembershipForAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelMembershipForAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result describeChannelModeratedByAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelModeratedByAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result describeChannelModerator(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelModeratorAsync(array $args = [])
 * @method \Aws\Result getChannelMessage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getChannelMessageAsync(array $args = [])
 * @method \Aws\Result getMessagingSessionEndpoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getMessagingSessionEndpointAsync(array $args = [])
 * @method \Aws\Result listChannelBans(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelBansAsync(array $args = [])
 * @method \Aws\Result listChannelMemberships(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelMembershipsAsync(array $args = [])
 * @method \Aws\Result listChannelMembershipsForAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelMembershipsForAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result listChannelMessages(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelMessagesAsync(array $args = [])
 * @method \Aws\Result listChannelModerators(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelModeratorsAsync(array $args = [])
 * @method \Aws\Result listChannels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsAsync(array $args = [])
 * @method \Aws\Result listChannelsModeratedByAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsModeratedByAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result redactChannelMessage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise redactChannelMessageAsync(array $args = [])
 * @method \Aws\Result sendChannelMessage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise sendChannelMessageAsync(array $args = [])
 * @method \Aws\Result updateChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelAsync(array $args = [])
 * @method \Aws\Result updateChannelMessage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelMessageAsync(array $args = [])
 * @method \Aws\Result updateChannelReadMarker(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelReadMarkerAsync(array $args = [])
 */
class ChimeSDKMessagingClient extends AwsClient {}
