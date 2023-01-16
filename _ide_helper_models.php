<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Activity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $is_active
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ActivityFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUrl($value)
 * @mixin \Eloquent
 */
	class Activity extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Answer
 *
 * @property int $id
 * @property int $user_id
 * @property int $option_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Option $options
 * @method static \Database\Factories\AnswerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereUserId($value)
 * @mixin \Eloquent
 */
	class Answer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Artist
 *
 * @property int $id
 * @property string $name
 * @property string|null $profile_picture
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $description
 * @property string|null $label
 * @property string|null $url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Song[] $songs
 * @property-read int|null $songs_count
 * @method static \Database\Factories\ArtistFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artist query()
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereProfilePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereUrl($value)
 * @mixin \Eloquent
 */
	class Artist extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Band
 *
 * @property int $id
 * @property string $name
 * @property string $image_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BandSchedule[] $schedules
 * @property-read int|null $schedules_count
 * @method static \Illuminate\Database\Eloquent\Builder|Band newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Band newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Band query()
 * @method static \Illuminate\Database\Eloquent\Builder|Band whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Band whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Band whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Band whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Band whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Band extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BandHasSchedule
 *
 * @property int $id
 * @property int $band_id
 * @property int $band_schedule_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BandHasSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BandHasSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BandHasSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|BandHasSchedule whereBandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BandHasSchedule whereBandScheduleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BandHasSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BandHasSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BandHasSchedule whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class BandHasSchedule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BandSchedule
 *
 * @property int $id
 * @property int $outlet_id
 * @property \Illuminate\Support\Carbon $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $cover_image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Band[] $bands
 * @property-read int|null $bands_count
 * @property-read \App\Models\Outlet $outlet
 * @method static \Illuminate\Database\Eloquent\Builder|BandSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BandSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BandSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|BandSchedule whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BandSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BandSchedule whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BandSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BandSchedule whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BandSchedule whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class BandSchedule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Banner
 *
 * @property int $id
 * @property int $whats_on_id
 * @property int $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\WhatsOn $whatsOn
 * @method static \Database\Factories\BannerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereWhatsOnId($value)
 * @mixin \Eloquent
 */
	class Banner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BottleKeep
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon $stored_at
 * @property mixed $status
 * @property \Illuminate\Support\Carbon|null $expired_at
 * @property int $outlet_id
 * @property string $phone_number
 * @property int|null $user_id
 * @property string $user_fullname
 * @property string|null $image_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $release_notes
 * @property int $remaining_keeps
 * @property-read mixed $release_date
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BottleKeepHistory[] $keepHistories
 * @property-read int|null $keep_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|BottleKeepLog[] $logs
 * @property-read int|null $logs_count
 * @property-read Outlet|null $outlet
 * @property-read BottleKeepLog|null $releaseLog
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\BottleKeepFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep query()
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep whereReleaseNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep whereRemainingKeeps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep whereStoredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep whereUserFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeep whereUserId($value)
 * @mixin \Eloquent
 */
	class BottleKeep extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BottleKeepHistory
 *
 * @property int $id
 * @property int $bottle_keep_id
 * @property string $image_url
 * @property string $description
 * @property \Illuminate\Support\Carbon $stored_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $release_notes
 * @property-read \App\Models\BottleKeep $bottleKeep
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepHistory whereBottleKeepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepHistory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepHistory whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepHistory whereReleaseNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepHistory whereStoredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $released_at
 * @method static \Database\Factories\BottleKeepHistoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepHistory whereReleasedAt($value)
 */
	class BottleKeepHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BottleKeepLog
 *
 * @property int $id
 * @property int $bottle_keep_id
 * @property mixed $action
 * @property User|null $created_by
 * @property string $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read BottleKeep|null $bottleKeepList
 * @method static \Database\Factories\BottleKeepLogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepLog whereBottleKeepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepLog whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepLog whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepLog whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property mixed|null $type
 * @property-read \App\Models\SingleSignOnUser|null $createdByAdmin
 * @property-read \App\Models\User|null $createdByUser
 * @property-read mixed $created
 * @method static \Illuminate\Database\Eloquent\Builder|BottleKeepLog whereType($value)
 */
	class BottleKeepLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Button
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 * @property string $url
 * @property int $position
 * @property int $is_active
 * @property int $use_header
 * @property int $use_auth
 * @property array|null $user_type_available
 * @property int|null $minimum_membership
 * @property string|null $min_app_version
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ButtonFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Button newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Button newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Button query()
 * @method static \Illuminate\Database\Eloquent\Builder|Button whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Button whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Button whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Button whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Button whereMinAppVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Button whereMinimumMembership($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Button whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Button wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Button whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Button whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Button whereUseAuth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Button whereUseHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Button whereUserTypeAvailable($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Membership|null $membership
 */
	class Button extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChangePhoneNumberLog
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $created_by
 * @property string|null $notes
 * @property string|null $old_phone_number
 * @property string|null $new_phone_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SingleSignOnUser|null $createdBy
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ChangePhoneNumberLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChangePhoneNumberLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChangePhoneNumberLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChangePhoneNumberLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChangePhoneNumberLog whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChangePhoneNumberLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChangePhoneNumberLog whereNewPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChangePhoneNumberLog whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChangePhoneNumberLog whereOldPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChangePhoneNumberLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChangePhoneNumberLog whereUserId($value)
 * @mixin \Eloquent
 */
	class ChangePhoneNumberLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Chart
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $week
 * @property int $year
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SongChart[] $songs
 * @property-read int|null $songs_count
 * @method static \Database\Factories\ChartFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Chart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chart whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chart whereWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chart whereYear($value)
 * @mixin \Eloquent
 */
	class Chart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Checklist
 *
 * @property int $id
 * @property int $checklist_outlet_answer_id
 * @property int $checklist_input_id
 * @property string $answer
 * @property mixed $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $single_sign_on_user_id
 * @property array|null $image_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChecklistChoice[] $checklistChoices
 * @property-read int|null $checklist_choices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChecklistImage[] $checklistImages
 * @property-read int|null $checklist_images_count
 * @property-read \App\Models\ChecklistInput $checklistInput
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChecklistInputChoice[] $inputChoice
 * @property-read int|null $input_choice_count
 * @property-read \App\Models\ChecklistOutletAnswer $outletAnswer
 * @property-read \App\Models\SingleSignOnUser $singleSignOnUser
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist query()
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereChecklistInputId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereChecklistOutletAnswerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereSingleSignOnUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Checklist extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChecklistCategory
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChecklistGroup[] $group
 * @property-read int|null $group_count
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistCategory whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ChecklistCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChecklistChoice
 *
 * @property int $id
 * @property int $checklist_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $checklist_input_choice_id
 * @property-read \App\Models\ChecklistInputChoice|null $choice
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistChoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistChoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistChoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistChoice whereChecklistId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistChoice whereChecklistInputChoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistChoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistChoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistChoice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ChecklistChoice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChecklistGroup
 *
 * @property int $id
 * @property string $name
 * @property array $role
 * @property mixed $type
 * @property int $position
 * @property mixed $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $checklist_category_id
 * @property-read \App\Models\ChecklistCategory|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChecklistOutlet[] $checklistOutlets
 * @property-read int|null $checklist_outlets_count
 * @property-read mixed $display_role
 * @property-read mixed $is_approve
 * @property-read mixed $is_complete
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChecklistInput[] $inputs
 * @property-read int|null $inputs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Outlet[] $outlets
 * @property-read int|null $outlets_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChecklistTemplate[] $templates
 * @property-read int|null $templates_count
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistGroup whereChecklistCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistGroup whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistGroup wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistGroup whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistGroup whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ChecklistGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChecklistImage
 *
 * @property int $id
 * @property int $checklist_id
 * @property string $image_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Checklist|null $checklists
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistImage whereChecklistId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistImage whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ChecklistImage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChecklistInput
 *
 * @property int $id
 * @property int $checklist_template_id
 * @property mixed $type
 * @property bool $is_multiple
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Checklist[] $checklists
 * @property-read int|null $checklists_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChecklistInputChoice[] $choices
 * @property-read int|null $choices_count
 * @property-read \App\Models\ChecklistTemplate $template
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInput newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInput newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInput query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInput whereChecklistTemplateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInput whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInput whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInput whereIsMultiple($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInput whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInput whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ChecklistInput extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChecklistInputChoice
 *
 * @property int $id
 * @property int $checklist_input_id
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ChecklistInput|null $input
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInputChoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInputChoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInputChoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInputChoice whereChecklistInputId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInputChoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInputChoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInputChoice whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistInputChoice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ChecklistInputChoice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChecklistOutlet
 *
 * @property int $id
 * @property int $checklist_group_id
 * @property int $outlet_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ChecklistGroup|null $group
 * @property-read \App\Models\Outlet $outlet
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutlet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutlet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutlet query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutlet whereChecklistGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutlet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutlet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutlet whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutlet whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ChecklistOutlet extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChecklistOutletAnswer
 *
 * @property int $id
 * @property int $outlet_id
 * @property \Illuminate\Support\Carbon $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Checklist[] $checklists
 * @property-read int|null $checklists_count
 * @property-read \App\Models\Outlet $outlet
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutletAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutletAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutletAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutletAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutletAnswer whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutletAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutletAnswer whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistOutletAnswer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ChecklistOutletAnswer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChecklistTemplate
 *
 * @property int $id
 * @property int $checklist_group_id
 * @property string|null $name
 * @property mixed $is_active
 * @property int $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ChecklistGroup $group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChecklistInput[] $inputs
 * @property-read int|null $inputs_count
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistTemplate whereChecklistGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistTemplate whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistTemplate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistTemplate wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChecklistTemplate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ChecklistTemplate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\City
 *
 * @property int $id
 * @property int $province_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Province $province
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ConfirmationCode
 *
 * @property int $id
 * @property string $phone_number
 * @property string $code
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationCode whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationCode wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationCode whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $email
 * @property int|null $single_sign_on_user_id
 * @property string|null $searched_at
 * @property-read \App\Models\SingleSignOnUser|null $singleSignOnUser
 * @method static \Database\Factories\ConfirmationCodeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationCode whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationCode whereSearchedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationCode whereSingleSignOnUserId($value)
 */
	class ConfirmationCode extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EventCost
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property int|null $table_id
 * @property int|null $table_category_id
 * @property int $cost
 * @property int|null $pax
 * @property int|null $extra_pax
 * @property int|null $extra_pax_charge
 * @property mixed|null $type
 * @property string|null $size
 * @property bool $reservation_available
 * @property bool $walkin_available
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $price
 * @property-read Table|null $table
 * @property-read TableCategory|null $tableCategory
 * @method static \Database\Factories\EventCostFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost whereExtraPax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost whereExtraPaxCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost wherePax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost whereReservationAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost whereTableCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost whereTableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost whereWalkinAvailable($value)
 * @mixin \Eloquent
 * @property bool|null $is_lock
 * @property-read \App\Models\GuestTable|null $guestTable
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost active()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost lock()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost reservationAvailable()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost walkinAvailable()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCost whereIsLock($value)
 */
	class EventCost extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GlobalNotification
 *
 * @property int $id
 * @property string $name
 * @property array|null $extra_data
 * @property \Illuminate\Support\Carbon|null $available_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $title
 * @property string|null $screen_name
 * @property int|null $screen_id
 * @property string|null $body
 * @property int|null $is_sent
 * @property string|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GlobalNotificationLog[] $logs
 * @property-read int|null $logs_count
 * @method static \Database\Factories\GlobalNotificationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotification whereAvailableAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotification whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotification whereExtraData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotification whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotification whereIsSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotification whereScreenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotification whereScreenName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class GlobalNotification extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GlobalNotificationLog
 *
 * @property int $id
 * @property int $global_notification_id
 * @property int|null $single_sign_on_user_id
 * @property mixed $action
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotificationLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotificationLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotificationLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotificationLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotificationLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotificationLog whereGlobalNotificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotificationLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotificationLog whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotificationLog whereSingleSignOnUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalNotificationLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class GlobalNotificationLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GuestList
 *
 * @property int $id
 * @property int|null $member_id
 * @property string|null $membership
 * @property string $name
 * @property string $phone
 * @property \Illuminate\Support\Carbon $date
 * @property mixed $status
 * @property int $outlet_id
 * @property int|null $pax
 * @property int|null $current_pax
 * @property int|null $minimum_cost
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GuestListLog[] $logs
 * @property-read int|null $logs_count
 * @property-read Outlet|null $outlet
 * @property-read GuestTable|null $table
 * @property-read \Illuminate\Database\Eloquent\Collection|GuestTable[] $tables
 * @property-read int|null $tables_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList currentOutlet()
 * @method static \Database\Factories\GuestListFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList query()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList time($date = null, $endDate = null)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList whereCurrentPax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList whereMembership($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList whereMinimumCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList wherePax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList whereTableName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestList whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\MinimumCostConfirmation|null $minimumCostConfirmation
 */
	class GuestList extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GuestListLog
 *
 * @property int $id
 * @property int $guest_list_id
 * @property mixed $action
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property User|null $created_by
 * @property-read GuestList $guest_list
 * @method static \Illuminate\Database\Eloquent\Builder|GuestListLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestListLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestListLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestListLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestListLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestListLog whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestListLog whereGuestListId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestListLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestListLog whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestListLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class GuestListLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GuestTable
 *
 * @property int $id
 * @property int|null $guest_list_id
 * @property int $table_id
 * @property float $minimum_cost
 * @property mixed $type
 * @property string|null $seated_at
 * @property string|null $closed_bill_at
 * @property bool $is_active
 * @property int|null $reservation_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read GuestList|null $list
 * @property-read \Illuminate\Database\Eloquent\Collection|GuestTableLog[] $logs
 * @property-read int|null $logs_count
 * @property-read Reservation|null $reservation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SongRequest[] $songRequest
 * @property-read int|null $song_request_count
 * @property-read Table $table
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable active()
 * @method static \Database\Factories\GuestTableFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable query()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable time($date = null, $endDate = null)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable whereClosedBillAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable whereGuestListId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable whereMinimumCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable whereReservationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable whereSeatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable whereTableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $pax
 * @property bool|null $is_special_reservation
 * @property float $price
 * @property-read \App\Models\Table|null $activeTable
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable specialReservation()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable whereIsSpecialReservation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable wherePax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTable wherePrice($value)
 */
	class GuestTable extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GuestTableLog
 *
 * @property int $id
 * @property int $guest_table_id
 * @property mixed $action
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property User|null $created_by
 * @property-read GuestList $guest_list
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTableLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTableLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTableLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTableLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTableLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTableLog whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTableLog whereGuestTableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTableLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTableLog whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestTableLog whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\SingleSignOnUser|null $createdBy
 */
	class GuestTableLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HolyChest
 *
 * @property int $id
 * @property string $name
 * @property int $point_perplay
 * @property int $cycle
 * @property int $total_cycle
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property mixed $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\HolyChestDetail[] $details
 * @property-read int|null $details_count
 * @property-read mixed $cycle_rate
 * @property-read mixed $days_left
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\HolyChestLog[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\HolyChestReward[] $rewards
 * @property-read int|null $rewards_count
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChest newQuery()
 * @method static \Illuminate\Database\Query\Builder|HolyChest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChest query()
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChest whereCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChest whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChest whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChest wherePointPerplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChest whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChest whereTotalCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|HolyChest withTrashed()
 * @method static \Illuminate\Database\Query\Builder|HolyChest withoutTrashed()
 * @mixin \Eloquent
 */
	class HolyChest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HolyChestDetail
 *
 * @property int $id
 * @property int $holy_chest_id
 * @property mixed $grade
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $voucher_id
 * @property-read HolyChest $holyChest
 * @property-read VoucherTemplate|null $voucherTemplate
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestDetail newQuery()
 * @method static \Illuminate\Database\Query\Builder|HolyChestDetail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestDetail whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestDetail whereHolyChestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestDetail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestDetail whereVoucherId($value)
 * @method static \Illuminate\Database\Query\Builder|HolyChestDetail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|HolyChestDetail withoutTrashed()
 * @mixin \Eloquent
 */
	class HolyChestDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HolyChestLog
 *
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $holy_chest_id
 * @property int $points
 * @property int $play_for
 * @property-read \App\Models\HolyChest|null $holyChest
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\HolyChestLogWinner[] $holyChestLogWinners
 * @property-read int|null $holy_chest_log_winners_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLog whereHolyChestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLog wherePlayFor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLog wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLog whereUserId($value)
 * @mixin \Eloquent
 */
	class HolyChestLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HolyChestLogWinner
 *
 * @property int $id
 * @property int $holy_chest_log_id
 * @property int $holy_chest_reward_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\HolyChestLog|null $holyChestLog
 * @property-read \App\Models\HolyChestReward|null $holyChestReward
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLogWinner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLogWinner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLogWinner query()
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLogWinner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLogWinner whereHolyChestLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLogWinner whereHolyChestRewardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLogWinner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestLogWinner whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class HolyChestLogWinner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HolyChestReward
 *
 * @property int $id
 * @property int $holy_chest_id
 * @property int $cycle
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $voucher_id
 * @property int|null $holy_chest_detail_id
 * @property-read \App\Models\HolyChest $holyChest
 * @property-read \App\Models\HolyChestDetail|null $holychestDetail
 * @property-read \App\Models\VoucherTemplate|null $voucherTemplate
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestReward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestReward newQuery()
 * @method static \Illuminate\Database\Query\Builder|HolyChestReward onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestReward query()
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestReward whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestReward whereCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestReward whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestReward whereHolyChestDetailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestReward whereHolyChestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestReward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestReward whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HolyChestReward whereVoucherId($value)
 * @method static \Illuminate\Database\Query\Builder|HolyChestReward withTrashed()
 * @method static \Illuminate\Database\Query\Builder|HolyChestReward withoutTrashed()
 * @mixin \Eloquent
 */
	class HolyChestReward extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ListBank
 *
 * @property int $id
 * @property string $name
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ListBankFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ListBank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListBank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListBank query()
 * @method static \Illuminate\Database\Eloquent\Builder|ListBank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListBank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListBank whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListBank whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListBank whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ListBank extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Log
 *
 * @property int $id
 * @property string $model_name
 * @property int $model_id
 * @property mixed $action
 * @property string $notes
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereModelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUserId($value)
 * @mixin \Eloquent
 */
	class Log extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Membership
 *
 * @property int $id
 * @property string $name
 * @property float $discount
 * @property bool $id_card_required
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float $minimum_experience
 * @property float|null $max_experience
 * @property string|null $description
 * @property int $recurring_exp_needed
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MembershipBenefit[] $benefits
 * @property-read int|null $benefits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership query()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereIdCardRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereMaxExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereMinimumExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereRecurringExpNeeded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\MembershipFactory factory(...$parameters)
 */
	class Membership extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MembershipBenefit
 *
 * @property int $id
 * @property int $membership_id
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $icon
 * @property-read \App\Models\Membership|null $membership
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipBenefit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipBenefit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipBenefit query()
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipBenefit whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipBenefit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipBenefit whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipBenefit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipBenefit whereMembershipId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipBenefit whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipBenefit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class MembershipBenefit extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MinimumCostConfirmation
 *
 * @property mixed $type
 * @property mixed $status
 * @property-read \App\Models\GuestList $guest_list
 * @property-read \App\Models\Table $table
 * @method static \Illuminate\Database\Eloquent\Builder|MinimumCostConfirmation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MinimumCostConfirmation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MinimumCostConfirmation query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $guest_list_id
 * @property int $table_id
 * @property int $pax
 * @property int $current_pax
 * @property int $minimum_cost
 * @property int $total_minimum_cost
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MinimumCostConfirmationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimumCostConfirmation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimumCostConfirmation whereCurrentPax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimumCostConfirmation whereGuestListId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimumCostConfirmation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimumCostConfirmation whereMinimumCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimumCostConfirmation wherePax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimumCostConfirmation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimumCostConfirmation whereTableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimumCostConfirmation whereTotalMinimumCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimumCostConfirmation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimumCostConfirmation whereUpdatedAt($value)
 */
	class MinimumCostConfirmation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NationalHoliday
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\NationalHolidayFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|NationalHoliday newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NationalHoliday newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NationalHoliday query()
 * @method static \Illuminate\Database\Eloquent\Builder|NationalHoliday whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NationalHoliday whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NationalHoliday whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NationalHoliday whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NationalHoliday whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class NationalHoliday extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Option
 *
 * @property int $id
 * @property int $question_id
 * @property string $name
 * @property int $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Answer[] $answers
 * @property-read int|null $answers_count
 * @property-read \App\Models\Question $question
 * @method static \Illuminate\Database\Eloquent\Builder|Option newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option query()
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Option extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Outlet
 *
 * @property int $id
 * @property string $name
 * @property mixed $type
 * @property float|null $lat
 * @property float|null $lng
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property bool $hr_visibility
 * @property bool $pos_visibility
 * @property bool $customer_visibility
 * @property string|null $address
 * @property string|null $contact
 * @property \Illuminate\Support\Carbon|null $open_hour
 * @property \Illuminate\Support\Carbon|null $close_hour
 * @property string|null $image
 * @property int $is_active
 * @property string|null $map_url
 * @property bool $open_status
 * @property string|null $pin_code
 * @property string|null $host_pin_code
 * @property string|null $token
 * @property bool $is_reservable
 * @property string|null $google_review_url
 * @property bool $open_for_reservation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GuestList[] $guests
 * @property-read int|null $guests_count
 * @property-read \Illuminate\Database\Eloquent\Collection|OutletImage[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|OutletOffSchedule[] $offSchedules
 * @property-read int|null $off_schedules_count
 * @property-read \Illuminate\Database\Eloquent\Collection|TableCategory[] $tableCategories
 * @property-read int|null $table_categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|OutletImageTag[] $tags
 * @property-read int|null $tags_count
 * @property-read OutletOffSchedule|null $todayOffSchedule
 * @property-read \Illuminate\Database\Eloquent\Collection|WhatsOn[] $whatsOn
 * @property-read int|null $whats_on_count
 * @method static \Database\Factories\OutletFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet onlyActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet visibleToCustomer()
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet visibleToHr()
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet visibleToPos()
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereCloseHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereCustomerVisibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereGoogleReviewUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereHrVisibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereIsReservable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereMapUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereOpenForReservation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereOpenHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereOpenStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet wherePosVisibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property bool $is_using_guest_layout
 * @property \Illuminate\Support\Carbon|null $cut_off_date
 * @property \Illuminate\Support\Carbon|null $maximum_eta
 * @property mixed $reservation_payment_type
 * @property float|null $tax
 * @property float|null $service
 * @property string|null $xendit_user_id
 * @property bool $use_tax
 * @property bool $use_service
 * @property string|null $general_admission_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BandSchedule[] $bandSchedules
 * @property-read int|null $band_schedules_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChecklistOutlet[] $checklistOutlets
 * @property-read int|null $checklist_outlets_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OutletMenu[] $menus
 * @property-read int|null $menus_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChecklistOutletAnswer[] $outletAnswer
 * @property-read int|null $outlet_answer_count
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereCutOffDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereGeneralAdmissionUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereHostPinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereIsUsingGuestLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereMaximumEta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereReservationPaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereUseService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereUseTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outlet whereXenditUserId($value)
 */
	class Outlet extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OutletImage
 *
 * @property int $id
 * @property int $outlet_id
 * @property string $image_url
 * @property int $position
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $caption
 * @property string|null $description
 * @property-read Outlet|null $outlet
 * @property-read \Illuminate\Database\Eloquent\Collection|OutletImageTag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImage whereCaption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImage whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImage whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImage whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImage wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class OutletImage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OutletImageTag
 *
 * @property int $id
 * @property string $name
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|OutletImage[] $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImageTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImageTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImageTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImageTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImageTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImageTag whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImageTag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletImageTag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class OutletImageTag extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OutletMenu
 *
 * @property int $id
 * @property int $outlet_id
 * @property string $version
 * @property string $menu_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed|null $type
 * @property-read \App\Models\Outlet $outlet
 * @method static \Illuminate\Database\Eloquent\Builder|OutletMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletMenu whereMenuUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletMenu whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletMenu whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletMenu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletMenu whereVersion($value)
 * @mixin \Eloquent
 */
	class OutletMenu extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OutletOffSchedule
 *
 * @property int $id
 * @property int $outlet_id
 * @property \Illuminate\Support\Carbon $date
 * @property bool $reservation_available
 * @property bool $walkin_available
 * @property bool $is_on_event
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Outlet|null $outlet
 * @method static \Illuminate\Database\Eloquent\Builder|OutletOffSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletOffSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletOffSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletOffSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletOffSchedule whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletOffSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletOffSchedule whereIsOnEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletOffSchedule whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletOffSchedule whereReservationAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletOffSchedule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletOffSchedule whereWalkinAvailable($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\OutletOffScheduleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletOffSchedule onEvent()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletOffSchedule reservationAvailable()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletOffSchedule walkinAvailable()
 */
	class OutletOffSchedule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OutletTableMap
 *
 * @property int $id
 * @property string $name
 * @property int $outlet_id
 * @property string $table_map
 * @property string|null $image_url
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $position
 * @property-read Outlet|null $outlet
 * @method static \Database\Factories\OutletTableMapFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletTableMap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletTableMap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletTableMap query()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletTableMap whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletTableMap whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletTableMap whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletTableMap whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletTableMap whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletTableMap whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletTableMap wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletTableMap whereTableMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletTableMap whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $date
 * @method static \Illuminate\Database\Eloquent\Builder|OutletTableMap active()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletTableMap whereDate($value)
 */
	class OutletTableMap extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OutletVoucher
 *
 * @property int $id
 * @property int|null $outlet_id
 * @property int|null $voucher_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Outlet|null $outlet
 * @property-read \App\Models\Voucher|null $voucher
 * @method static \Illuminate\Database\Eloquent\Builder|OutletVoucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletVoucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletVoucher query()
 * @method static \Illuminate\Database\Eloquent\Builder|OutletVoucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletVoucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletVoucher whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletVoucher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutletVoucher whereVoucherId($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\OutletVoucherFactory factory(...$parameters)
 */
	class OutletVoucher extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payment
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $reservation_id
 * @property int $point
 * @property int $amount
 * @property mixed $status
 * @property mixed|null $type
 * @property mixed $purpose
 * @property string|null $transaction_id
 * @property string|null $invoice_url
 * @property array|null $response_json
 * @property array|null $extra_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PaymentLog[] $logs
 * @property-read int|null $logs_count
 * @property-read \App\Models\PaymentRefund|null $refund
 * @property-read \App\Models\Reservation|null $reservation
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\PaymentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereExtraData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereInvoiceUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereReservationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereResponseJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $external_id
 * @property int $retry_count
 * @property bool $forwarded
 * @property int|null $xendit_fee
 * @property int $discount
 * @property float|null $tax
 * @property float|null $service
 * @property float $price
 * @property string|null $user_ip_address
 * @property-read int $refund_amount
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereExternalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereForwarded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereRetryCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUserIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereXenditFee($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentLog
 *
 * @property int $id
 * @property int $payment_id
 * @property int|null $created_by
 * @property mixed|null $user_type
 * @property mixed $action
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Payment|null $payment
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentLog whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentLog whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentLog wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentLog whereUserType($value)
 * @mixin \Eloquent
 */
	class PaymentLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentRefund
 *
 * @property int $id
 * @property int $payment_id
 * @property string $account_number
 * @property string $bank_name
 * @property int $amount
 * @property mixed $status
 * @property string|null $image_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $account_name
 * @property-read Payment $payment
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $single_sign_on_user_id
 * @property string|null $disbursement_id
 * @property array|null $response_json
 * @property-read \App\Models\SingleSignOnUser|null $createdBy
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund whereDisbursementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund whereResponseJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentRefund whereSingleSignOnUserId($value)
 */
	class PaymentRefund extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Playlist
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image
 * @property string|null $url
 * @property string|null $description
 * @method static \Database\Factories\PlaylistFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist query()
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereUrl($value)
 * @mixin \Eloquent
 */
	class Playlist extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PosComplaint
 *
 * @property int $id
 * @property int $complaint_id
 * @property int $session_id
 * @property int $outlet_id
 * @property int $type 1: komplain, 2: pujian
 * @property string $no_table
 * @property int $pax
 * @property string $time
 * @property string $note
 * @property int $status
 * @property int $uploaded
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $_created_time
 * @property string $_update_time
 * @property-read \App\Models\Outlet $outlet
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint query()
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint whereComplaintId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint whereCreatedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint whereNoTable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint wherePax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint whereUpdateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosComplaint whereUploaded($value)
 * @mixin \Eloquent
 */
	class PosComplaint extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PosRejectCustomer
 *
 * @property int $id
 * @property int $reject_customer_id
 * @property int $session_id
 * @property int $outlet_id
 * @property int $reason 1: fulltable, 2: mc kemahalan, 4: tidak datang, 8: abstain, 16: lainnya
 * @property string $name
 * @property string $phone
 * @property int $pax
 * @property string $time
 * @property string $note
 * @property int $status
 * @property int $uploaded
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $_created_time
 * @property string $_update_time
 * @property-read \App\Models\Outlet $outlet
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer query()
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer whereCreatedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer wherePax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer whereRejectCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer whereUpdateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectCustomer whereUploaded($value)
 * @mixin \Eloquent
 */
	class PosRejectCustomer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PosRejectMenu
 *
 * @property int $id
 * @property int $reject_menu_id
 * @property int $session_id
 * @property int $outlet_id
 * @property int $category 1: minuman, 2: makanan
 * @property string $no_table
 * @property int $pax
 * @property string $time
 * @property string $note
 * @property int $status
 * @property int $uploaded
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $_created_time
 * @property string $_update_time
 * @property-read \App\Models\Outlet $outlet
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu whereCreatedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu whereNoTable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu wherePax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu whereRejectMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu whereUpdateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosRejectMenu whereUploaded($value)
 * @mixin \Eloquent
 */
	class PosRejectMenu extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PosWhatsapp
 *
 * @property int $id
 * @property string $code
 * @property int $status
 * @property int $id_bill
 * @property int $outlet_id
 * @property int $user_id
 * @property int|null $star
 * @property string|null $notes
 * @property int|null $ambience
 * @property int|null $drink
 * @property int|null $food
 * @property int|null $price
 * @property int|null $service
 * @property string $outlet_name
 * @property string $customer_phone
 * @property string|null $customer_name
 * @property int $spending
 * @property string $bill_closed_at
 * @property string|null $wa_sent_at
 * @property string|null $reviewed_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Outlet $outlet
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp query()
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereAmbience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereBillClosedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereCustomerPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereDrink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereFood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereIdBill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereOutletName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereReviewedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereSpending($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereStar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PosWhatsapp whereWaSentAt($value)
 * @mixin \Eloquent
 */
	class PosWhatsapp extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Province
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\City[] $cities
 * @property-read int|null $cities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Province extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Question
 *
 * @property int $id
 * @property string $name
 * @property int $position
 * @property mixed $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Answer[] $answers
 * @property-read int|null $answers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Option[] $options
 * @property-read int|null $options_count
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Question extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Reservation
 *
 * @property int $id
 * @property int $member_id
 * @property string|null $membership
 * @property string $name
 * @property string $phone
 * @property \Illuminate\Support\Carbon $datetime
 * @property int $minimum_cost
 * @property mixed $status
 * @property string|null $notes
 * @property int $no_answer_count
 * @property string|null $reason
 * @property mixed $type
 * @property int $pax
 * @property string|null $unique_identifier
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $cancellation_notes
 * @property int $notification_counter
 * @property-read GuestTable|null $detail
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReservationLog[] $logs
 * @property-read int|null $logs_count
 * @property-read Outlet $outlet
 * @property-read \App\Models\Payment|null $payment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read Table|null $table
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\ReservationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation time($date = null, $endDate = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCancellationNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereMembership($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereMinimumCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereNoAnswerCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereNotificationCounter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation wherePax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUniqueIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $event_name
 * @property mixed $payment_type
 * @property float|null $credit
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GuestTable[] $details
 * @property-read int|null $details_count
 * @property-read mixed $date
 * @property-read mixed $time
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Table[] $tables
 * @property-read int|null $tables_count
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereEventName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation wherePaymentType($value)
 */
	class Reservation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ReservationCancelReason
 *
 * @property int $id
 * @property string $name
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ReservationCancelReasonFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationCancelReason newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationCancelReason newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationCancelReason query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationCancelReason whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationCancelReason whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationCancelReason whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationCancelReason whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationCancelReason whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ReservationCancelReason extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ReservationLog
 *
 * @property int $id
 * @property int $reservation_id
 * @property int|null $user_id
 * @property mixed $action
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Reservation $reservation
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationLog whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationLog whereReservationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationLog whereUserId($value)
 * @mixin \Eloquent
 */
	class ReservationLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ReservationRefundSetting
 *
 * @property int $id
 * @property int $hours_left
 * @property int $refund_percentage
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ReservationRefundSettingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationRefundSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationRefundSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationRefundSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationRefundSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationRefundSetting whereHoursLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationRefundSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationRefundSetting whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationRefundSetting whereRefundPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationRefundSetting whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $title
 * @property string|null $description
 * @property string|null $icon
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationRefundSetting whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationRefundSetting whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReservationRefundSetting whereTitle($value)
 */
	class ReservationRefundSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string|null $faq_title
 * @property string|null $faq_url
 * @property string|null $policy_title
 * @property string|null $policy_url
 * @property string|null $contact_title
 * @property string|null $contact_url
 * @property string|null $email_title
 * @property string|null $email_url
 * @property string|null $instagram_title
 * @property string|null $instagram_url
 * @property string|null $twitter_title
 * @property string|null $twitter_url
 * @property string|null $facebook_title
 * @property string|null $facebook_url
 * @property string|null $youtube_title
 * @property string|null $youtube_url
 * @property string|null $tiktok_title
 * @property string|null $tiktok_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $popup_id
 * @property-read \App\Models\WhatsOn|null $whatsOn
 * @method static \Database\Factories\SettingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereContactTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereContactUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereEmailTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereEmailUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFacebookTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFacebookUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFaqTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFaqUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereInstagramTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereInstagramUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePolicyTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePolicyUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePopupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTiktokTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTiktokUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTwitterTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTwitterUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereYoutubeTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereYoutubeUrl($value)
 * @mixin \Eloquent
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SingleSignOnUser
 *
 * @property int $id
 * @property int $user_id
 * @property string $username
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $outlet_id
 * @property-read mixed $user_type
 * @property-read \App\Models\Outlet|null $outlet
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUser permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUser role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUser whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUser whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUser whereUsername($value)
 * @mixin \Eloquent
 */
	class SingleSignOnUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SingleSignOnUserLog
 *
 * @property int $id
 * @property int $single_sign_on_user_id
 * @property string $action
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SingleSignOnUser $singleSignOnUser
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUserLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUserLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUserLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUserLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUserLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUserLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUserLog whereSingleSignOnUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SingleSignOnUserLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class SingleSignOnUserLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SmsEngineLog
 *
 * @property int $id
 * @property string $endpoint
 * @property string $request_body
 * @property string $response
 * @property string $status
 * @property string|null $phone_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SmsEngineLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsEngineLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsEngineLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsEngineLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsEngineLog whereEndpoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsEngineLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsEngineLog wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsEngineLog whereRequestBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsEngineLog whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsEngineLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsEngineLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class SmsEngineLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Song
 *
 * @property int $id
 * @property int $artist_id
 * @property string $title
 * @property string|null $spotify_url
 * @property string|null $apple_music_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image_url
 * @property-read \App\Models\Artist|null $artist
 * @property-read \Illuminate\Database\Eloquent\Collection|SongChart[] $charts
 * @property-read int|null $charts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Playlist[] $playlists
 * @property-read int|null $playlists_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SongRequest[] $songRequest
 * @property-read int|null $song_request_count
 * @method static \Database\Factories\SongFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Song newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Song newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Song query()
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereAppleMusicUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereArtistId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereSpotifyUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Song extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SongChart
 *
 * @property int $id
 * @property int $song_id
 * @property int $chart_id
 * @property int $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Chart|null $chart
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \App\Models\Song|null $song
 * @method static \Illuminate\Database\Eloquent\Builder|SongChart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SongChart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SongChart query()
 * @method static \Illuminate\Database\Eloquent\Builder|SongChart whereChartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SongChart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SongChart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SongChart wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SongChart whereSongId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SongChart whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class SongChart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SongRequest
 *
 * @property int $id
 * @property int $song_id
 * @property int $user_id
 * @property int $guest_table_id
 * @property \Illuminate\Support\Carbon $datetime
 * @property int $position
 * @property mixed $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read GuestTable $guestTable
 * @property-read Song|null $song
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|SongRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SongRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SongRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|SongRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SongRequest whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SongRequest whereGuestTableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SongRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SongRequest wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SongRequest whereSongId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SongRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SongRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SongRequest whereUserId($value)
 * @mixin \Eloquent
 */
	class SongRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SpecialRegistration
 *
 * @property int $id
 * @property string $phone_number
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialRegistration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialRegistration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialRegistration query()
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialRegistration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialRegistration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialRegistration wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialRegistration whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialRegistration whereUserId($value)
 * @mixin \Eloquent
 */
	class SpecialRegistration extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Table
 *
 * @property int $id
 * @property int $table_category_id
 * @property string $name
 * @property string|null $local_id
 * @property bool $reservation_available
 * @property bool $walkin_available
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read TableCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EventCost[] $events
 * @property-read int|null $events_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GuestTable[] $guest
 * @property-read int|null $guest_count
 * @method static \Database\Factories\TableFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Table newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Table newQuery()
 * @method static \Illuminate\Database\Query\Builder|Table onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Table query()
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereLocalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereReservationAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereTableCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereWalkinAvailable($value)
 * @method static \Illuminate\Database\Query\Builder|Table withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Table withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\Models\TableCategory|null $outlet
 * @method static \Illuminate\Database\Eloquent\Builder|Table onlyReservationAvailable()
 * @method static \Illuminate\Database\Eloquent\Builder|Table onlyWalkinAvailable()
 */
	class Table extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TableCategory
 *
 * @property int $id
 * @property string $name
 * @property float $minimum_cost_weekday
 * @property float $minimum_cost_weekend
 * @property mixed $type
 * @property int $maximum_capacity
 * @property int $extra_seat
 * @property int $extra_pax_cost
 * @property string|null $prefix
 * @property string|null $size
 * @property int|null $outlet_table_map_id
 * @property int|null $outlet_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|EventCost[] $events
 * @property-read int|null $events_count
 * @property-read mixed $total_maximum_capacity
 * @property-read Outlet|null $outlet
 * @property-read \App\Models\OutletTableMap|null $outletTableMap
 * @property-read \Illuminate\Database\Eloquent\Collection|Table[] $tables
 * @property-read int|null $tables_count
 * @method static \Database\Factories\TableCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory whereExtraPaxCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory whereExtraSeat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory whereMaximumCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory whereMinimumCostWeekday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory whereMinimumCostWeekend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory whereOutletTableMapId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory wherePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory whereReservationPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $price_weekday
 * @property int $price_weekend
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory wherePriceWeekday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TableCategory wherePriceWeekend($value)
 */
	class TableCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ThirdPartySetting
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartySetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartySetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartySetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartySetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartySetting whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartySetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartySetting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartySetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThirdPartySetting whereValue($value)
 * @mixin \Eloquent
 */
	class ThirdPartySetting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $phone_number
 * @property string|null $email
 * @property mixed|null $gender
 * @property int $point
 * @property int $coin
 * @property mixed $status
 * @property string|null $profile_picture
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $date_of_birth
 * @property string $name
 * @property string|null $identification_number
 * @property string|null $identification_card_picture
 * @property int|null $province_id
 * @property int|null $city_id
 * @property string|null $unique_identifier
 * @property int|null $type_id
 * @property string|null $facebook_uuid
 * @property string|null $google_uuid
 * @property string|null $twitter_uuid
 * @property int $membership_id
 * @property bool $is_profile_update_required
 * @property-read UserMembership|null $activeMembership
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserActivity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UserAddress[] $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Answer[] $answers
 * @property-read int|null $answers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BottleKeep[] $bottles
 * @property-read int|null $bottles_count
 * @property-read City|null $city
 * @property-read UserMembership|null $current_membership
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multicaret\Acquaintances\Models\Friendship[] $friends
 * @property-read int|null $friends_count
 * @property-read string $first_name
 * @property-read string $last_name
 * @property-read mixed $remaining_point
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multicaret\Acquaintances\Models\FriendFriendshipGroups[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\HolyChestLog[] $holyChestLogs
 * @property-read int|null $holy_chest_logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserLoginLog[] $loginLogs
 * @property-read int|null $login_logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \App\Models\Membership|null $membership
 * @property-read \Illuminate\Database\Eloquent\Collection|UserMembership[] $membership_data
 * @property-read int|null $membership_data_count
 * @property-read \App\Models\UserMetadata|null $metadata
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UserPointLog[] $pointLogs
 * @property-read int|null $point_logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserPoint[] $points
 * @property-read int|null $points_count
 * @property-read Province|null $province
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reservation[] $reservations
 * @property-read int|null $reservations_count
 * @property-read UserSetting|null $settings
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SongRequest[] $songRequest
 * @property-read int|null $song_request_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read UserType|null $type
 * @property-read \Illuminate\Database\Eloquent\Collection|Voucher[] $vouchers
 * @property-read int|null $vouchers_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCoin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFacebookUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGoogleUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdentificationCardPicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdentificationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsProfileUpdateRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMembershipId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwitterUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUniqueIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @mixin \Eloquent
 * @property string|null $platform_type
 * @property string|null $os_version
 * @property string|null $app_version
 * @property string|null $apple_uuid
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Checklist[] $checklists
 * @property-read int|null $checklists_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Outlet[] $favoriteOutlets
 * @property-read int|null $favorite_outlets_count
 * @property-read mixed $total_vouchers
 * @method static \Illuminate\Database\Eloquent\Builder|User unverified()
 * @method static \Illuminate\Database\Eloquent\Builder|User verified()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAppVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAppleUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOsVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePlatformType($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserActivity
 *
 * @property int $id
 * @property int $user_id
 * @property int $activity_id
 * @property array|null $params
 * @property int $is_active
 * @property Carbon $created
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\Activity|null $activity
 * @property-read mixed $detail
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserActivity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserActivity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserActivity query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserActivity whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserActivity whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserActivity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserActivity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserActivity whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserActivity whereParams($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserActivity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserActivity whereUserId($value)
 * @mixin \Eloquent
 */
	class UserActivity extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserAddress
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $address
 * @property string|null $phone_number
 * @property float $lat
 * @property float $lng
 * @property bool $is_default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereUserId($value)
 * @mixin \Eloquent
 */
	class UserAddress extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserLoginLog
 *
 * @property int $id
 * @property int $user_id
 * @property string $user_agent
 * @property string $ip_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginLog whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginLog whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginLog whereUserId($value)
 * @mixin \Eloquent
 */
	class UserLoginLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserMembership
 *
 * @property int $id
 * @property int $user_id
 * @property int $membership_id
 * @property float $experience
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $year
 * @property \Illuminate\Support\Carbon|null $expired_date
 * @property mixed $status
 * @property float|null $total_spend
 * @property-read \Illuminate\Database\Eloquent\Collection|UserMembershipLog[] $logs
 * @property-read int|null $logs_count
 * @property-read Membership|null $membership
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereExpiredDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereMembershipId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereTotalSpend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereYear($value)
 * @mixin \Eloquent
 */
	class UserMembership extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserMembershipLog
 *
 * @property int $id
 * @property int $user_membership_id
 * @property mixed $action
 * @property string $notes
 * @property mixed $type
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserMembership|null $UserMembership
 * @property-read \App\Models\User $createdBy
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembershipLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembershipLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembershipLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembershipLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembershipLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembershipLog whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembershipLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembershipLog whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembershipLog whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembershipLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembershipLog whereUserMembershipId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\SingleSignOnUser $createdByAdmin
 * @property-read \App\Models\User $createdByUser
 * @property-read mixed $created
 */
	class UserMembershipLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserMetadata
 *
 * @property int $id
 * @property int $user_id
 * @property int $reservation_banned_count
 * @property bool $is_reservation_banned
 * @property \Illuminate\Support\Carbon|null $banned_until
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserMetadata newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMetadata newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMetadata query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMetadata whereBannedUntil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMetadata whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMetadata whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMetadata whereIsReservationBanned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMetadata whereReservationBannedCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMetadata whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMetadata whereUserId($value)
 * @mixin \Eloquent
 */
	class UserMetadata extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserPoint
 *
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon $period
 * @property \Illuminate\Support\Carbon $expired_at
 * @property int $point_earned
 * @property int $point_remaining
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $point_expired
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint wherePointEarned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint wherePointExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint wherePointRemaining($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint whereUserId($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\UserPointFactory factory(...$parameters)
 */
	class UserPoint extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserPointLog
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $notes
 * @property int $point
 * @property mixed $action
 * @property mixed $type
 * @property int|null $outlet_id
 * @property int $created_by
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property int|null $total_payment
 * @property-read \App\Models\User $createdBy
 * @property-read \App\Models\Outlet|null $outlet
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointLog whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointLog whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointLog whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointLog wherePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointLog whereTotalPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointLog whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointLog whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\SingleSignOnUser $createdByAdmin
 * @property-read \App\Models\User $createdByUser
 * @property-read mixed $created
 */
	class UserPointLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserSetting
 *
 * @property int $id
 * @property int $user_id
 * @property bool $app_transaction_notification
 * @property bool $app_voucher_redemption_notification
 * @property bool $app_new_event_notification
 * @property bool $app_new_promo_notification
 * @property bool $app_newsletter_notification
 * @property bool $app_password_change_notification
 * @property bool $email_transaction_notification
 * @property bool $email_voucher_redemption_notification
 * @property bool $email_new_event_notification
 * @property bool $email_new_promo_notification
 * @property bool $email_newsletter_notification
 * @property bool $email_password_change_notification
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereAppNewEventNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereAppNewPromoNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereAppNewsletterNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereAppPasswordChangeNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereAppTransactionNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereAppVoucherRedemptionNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereEmailNewEventNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereEmailNewPromoNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereEmailNewsletterNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereEmailPasswordChangeNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereEmailTransactionNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereEmailVoucherRedemptionNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereUserId($value)
 * @mixin \Eloquent
 */
	class UserSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserType
 *
 * @property int $id
 * @property string|null $name
 * @property float $discount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|UserType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserType query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class UserType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Voucher
 *
 * @property int $id
 * @property int $user_id
 * @property int $voucher_template_id
 * @property string $code
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed $status
 * @property int|null $outlet_id
 * @property-read \Illuminate\Database\Eloquent\Collection|VoucherLog[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Outlet[] $outlets
 * @property-read int|null $outlets_count
 * @property-read VoucherTemplate|null $template
 * @property-read User $user
 * @method static \Database\Factories\VoucherFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereVoucherTemplateId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Outlet|null $outlet
 */
	class Voucher extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\VoucherCoupon
 *
 * @property int $id
 * @property int $voucher_template_id
 * @property string $code
 * @property int $quantity
 * @property int $is_active
 * @property int $expiring_in
 * @property int|null $claimed_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $claimedBy
 * @property-read \App\Models\VoucherTemplate $voucherTemplate
 * @method static \Database\Factories\VoucherCouponFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherCoupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherCoupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherCoupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherCoupon whereClaimedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherCoupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherCoupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherCoupon whereExpiringIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherCoupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherCoupon whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherCoupon whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherCoupon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherCoupon whereVoucherTemplateId($value)
 * @mixin \Eloquent
 */
	class VoucherCoupon extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\VoucherLog
 *
 * @property int $id
 * @property int $voucher_id
 * @property string $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $action
 * @property-read Voucher $voucher
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherLog whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherLog whereVoucherId($value)
 * @mixin \Eloquent
 */
	class VoucherLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\VoucherTemplate
 *
 * @property int $id
 * @property string $code_prefix
 * @property string $title
 * @property string $description
 * @property string $how_to_use
 * @property string $terms_and_condition
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image_url
 * @property bool $is_giftable
 * @property float $price
 * @property int $max_daily_claim
 * @property int $max_active_own
 * @property bool $allow_duplicate
 * @property float|null $discount_percentage
 * @property int|null $discount_value
 * @property int|null $slashed_price
 * @property mixed $discount_type
 * @property bool $is_gacha
 * @property float $item_price
 * @property int $is_active
 * @property bool $is_visible
 * @property-read \Illuminate\Database\Eloquent\Collection|HolyChestLog[] $holyChestLog
 * @property-read int|null $holy_chest_log_count
 * @property-read \Illuminate\Database\Eloquent\Collection|HolyChestReward[] $holyChestReward
 * @property-read int|null $holy_chest_reward_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Voucher[] $vouchers
 * @property-read int|null $vouchers_count
 * @method static \Database\Factories\VoucherTemplateFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate onlyActive()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate onlyVisible()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereAllowDuplicate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereCodePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereDiscountPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereDiscountValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereHowToUse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereIsGacha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereIsGiftable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereItemPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereMaxActiveOwn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereMaxDailyClaim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereSlashedPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereTermsAndCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherTemplate withoutGacha()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VoucherCoupon[] $coupons
 * @property-read int|null $coupons_count
 */
	class VoucherTemplate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WhatsOn
 *
 * @property int $id
 * @property mixed $type
 * @property string $title
 * @property string $description
 * @property string|null $image_url
 * @property mixed $status
 * @property string|null $how_to_use
 * @property string|null $terms_and_condition
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $old_migration_id
 * @property string|null $display_from
 * @property string|null $display_to
 * @property string|null $whatsapp
 * @property-read \App\Models\Banner|null $banner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Outlet[] $outlets
 * @property-read int|null $outlets_count
 * @method static \Database\Factories\WhatsOnFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn query()
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereDisplayFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereDisplayTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereHowToUse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereOldMigrationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereTermsAndCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereWhatsapp($value)
 * @mixin \Eloquent
 * @property mixed|null $standing_available
 * @property bool|null $is_price_uploaded
 * @property mixed|null $is_promoted
 * @property \Illuminate\Support\Carbon|null $event_date
 * @property int|null $outlet_id
 * @property \Illuminate\Support\Carbon|null $open_gate
 * @property mixed|null $reservation_type
 * @property mixed|null $availability_type
 * @property mixed $reservation_payment_type
 * @property int $is_sold_out
 * @property int $is_sold_out_standing
 * @property float|null $credit
 * @property string|null $sponsor
 * @property int $use_tax
 * @property int $use_service
 * @property string|null $general_admission_url
 * @property string|null $inclusion_list
 * @property-read mixed $event_availability
 * @property-read \App\Models\Outlet|null $outlet
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn active()
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereAvailabilityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereEventDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereGeneralAdmissionUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereInclusionList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereIsPriceUploaded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereIsPromoted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereIsSoldOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereIsSoldOutStanding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereOpenGate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereReservationPaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereReservationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereSponsor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereStandingAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereUseService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhatsOn whereUseTax($value)
 */
	class WhatsOn extends \Eloquent {}
}

