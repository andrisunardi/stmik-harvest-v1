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
 * App\Models\AdmissionCalendar
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_id
 * @property string|null $description
 * @property string|null $description_id
 * @property \Illuminate\Support\Carbon|null $date
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar active()
 * @method static \Database\Factories\AdmissionCalendarFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdmissionCalendar onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereDescriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|AdmissionCalendar withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdmissionCalendar withoutTrashed()
 * @property string|null $name_idn
 * @property string|null $description_idn
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionCalendar whereNameIdn($value)
 * @mixin \Eloquent
 */
	class AdmissionCalendar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Banner
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_idn
 * @property string|null $description
 * @property string|null $description_idn
 * @property string|null $image
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Banner active()
 * @method static \Database\Factories\BannerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newQuery()
 * @method static \Illuminate\Database\Query\Builder|Banner onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Banner withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Banner withoutTrashed()
 * @mixin \Eloquent
 */
	class Banner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Blog
 *
 * @property int $id
 * @property int|null $blog_category_id
 * @property string|null $title
 * @property string|null $title_idn
 * @property string|null $short_body
 * @property string|null $short_body_idn
 * @property string|null $body
 * @property string|null $body_idn
 * @property \Illuminate\Support\Carbon|null $date
 * @property string|null $tag
 * @property string|null $tag_id
 * @property string|null $image
 * @property string|null $slug
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\BlogCategory|null $blogCategory
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read mixed $translate_tag
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Blog active()
 * @method static \Database\Factories\BlogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Query\Builder|Blog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBlogCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBodyIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereShortBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereShortBodyIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitleIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Blog withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Blog withoutTrashed()
 * @property string|null $tag_idn
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTagIdn($value)
 * @property-read mixed $translate_body
 * @property-read mixed $translate_short_body
 * @property-read mixed $translate_title
 * @mixin \Eloquent
 */
	class Blog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BlogCategory
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_id
 * @property string|null $description
 * @property string|null $description_id
 * @property string|null $slug
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Blog[] $blogs
 * @property-read int|null $blogs_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory active()
 * @method static \Database\Factories\BlogCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|BlogCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereDescriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|BlogCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BlogCategory withoutTrashed()
 * @property string|null $name_idn
 * @property string|null $description_idn
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereNameIdn($value)
 * @mixin \Eloquent
 */
	class BlogCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $company
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $subject
 * @property string|null $message
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Contact active()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact inActive()
 * @method static \Illuminate\Database\Query\Builder|Contact onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Contact withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Contact withoutTrashed()
 * @method static \Database\Factories\ContactFactory factory(...$parameters)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Event
 *
 * @property int $id
 * @property int|null $event_category_id
 * @property string|null $title
 * @property string|null $title_idn
 * @property string|null $short_body
 * @property string|null $short_body_idn
 * @property string|null $body
 * @property string|null $body_idn
 * @property string|null $location
 * @property \Illuminate\Support\Carbon|null $start
 * @property \Illuminate\Support\Carbon|null $end
 * @property string|null $tag
 * @property string|null $tag_id
 * @property string|null $image
 * @property string|null $slug
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\EventCategory|null $eventCategory
 * @property-read mixed $image_url
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read mixed $translate_tag
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Event active()
 * @method static \Database\Factories\EventFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Event inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Query\Builder|Event onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereBodyIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEventCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereShortBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereShortBodyIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTitleIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Event withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Event withoutTrashed()
 * @property string|null $tag_idn
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTagIdn($value)
 * @property-read mixed $translate_body
 * @property-read mixed $translate_short_body
 * @property-read mixed $translate_title
 * @mixin \Eloquent
 */
	class Event extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EventCategory
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_id
 * @property string|null $description
 * @property string|null $description_id
 * @property string|null $slug
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Event[] $events
 * @property-read int|null $events_count
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory active()
 * @method static \Database\Factories\EventCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|EventCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereDescriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|EventCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EventCategory withoutTrashed()
 * @property string|null $name_idn
 * @property string|null $description_idn
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereNameIdn($value)
 * @mixin \Eloquent
 */
	class EventCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Faq
 *
 * @property int $id
 * @property string|null $question
 * @property string|null $question_idn
 * @property string|null $answer
 * @property string|null $answer_idn
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $translate_answer
 * @property-read mixed $translate_question
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Faq active()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq inActive()
 * @method static \Illuminate\Database\Query\Builder|Faq onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereAnswerIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereQuestionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Faq withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Faq withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Database\Factories\FaqFactory factory(...$parameters)
 * @mixin \Eloquent
 */
	class Faq extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Gallery
 *
 * @property int $id
 * @property GalleryCategory|null $category
 * @property string|null $name
 * @property string|null $name_idn
 * @property string|null $description
 * @property string|null $description_idn
 * @property string|null $tag
 * @property string|null $tag_idn
 * @property string|null $image
 * @property string|null $video
 * @property string|null $youtube
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read mixed $video_url
 * @property-read mixed $youtube_code
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery active()
 * @method static \Database\Factories\GalleryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newQuery()
 * @method static \Illuminate\Database\Query\Builder|Gallery onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereTagIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereYoutube($value)
 * @method static \Illuminate\Database\Query\Builder|Gallery withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Gallery withoutTrashed()
 * @property-read mixed $translate_tag
 * @mixin \Eloquent
 */
	class Gallery extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Network
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $link
 * @property string|null $image
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Network active()
 * @method static \Database\Factories\NetworkFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Network inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Network newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Network newQuery()
 * @method static \Illuminate\Database\Query\Builder|Network onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Network query()
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Network withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Network withoutTrashed()
 * @mixin \Eloquent
 */
	class Network extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Newsletter
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $phone
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter active()
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter inActive()
 * @method static \Illuminate\Database\Query\Builder|Newsletter onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Newsletter withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Newsletter withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property string|null $value
 * @property NewsletterType|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereValue($value)
 * @method static \Database\Factories\NewsletterFactory factory(...$parameters)
 * @mixin \Eloquent
 */
	class Newsletter extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Offer
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_idn
 * @property string|null $description
 * @property string|null $description_idn
 * @property string|null $button_name
 * @property string|null $button_name_idn
 * @property string|null $button_link
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $translate_button_name
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Offer active()
 * @method static \Database\Factories\OfferFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newQuery()
 * @method static \Illuminate\Database\Query\Builder|Offer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereButtonLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereButtonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereButtonNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Offer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Offer withoutTrashed()
 * @property string|null $description_idn
 * @mixin \Eloquent
 */
	class Offer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Procedure
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_id
 * @property string|null $description
 * @property string|null $description_id
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure active()
 * @method static \Database\Factories\ProcedureFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure newQuery()
 * @method static \Illuminate\Database\Query\Builder|Procedure onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure query()
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereDescriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Procedure withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Procedure withoutTrashed()
 * @property string|null $name_idn
 * @property string|null $description_idn
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereNameIdn($value)
 * @mixin \Eloquent
 */
	class Procedure extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Registration
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property RegistrationGender|null $gender
 * @property string|null $school
 * @property string|null $major
 * @property string|null $city
 * @property RegistrationType|null $type
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Registration active()
 * @method static \Database\Factories\RegistrationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Registration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Registration newQuery()
 * @method static \Illuminate\Database\Query\Builder|Registration onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Registration query()
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereMajor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Registration whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Registration withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Registration withoutTrashed()
 * @mixin \Eloquent
 */
	class Registration extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string|null $key
 * @property string|null $value
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Setting active()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Query\Builder|Setting onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|Setting withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Setting withoutTrashed()
 * @method static \Database\Factories\SettingFactory factory(...$parameters)
 * @mixin \Eloquent
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slider
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_idn
 * @property string|null $description
 * @property string|null $description_idn
 * @property string|null $button_name
 * @property string|null $button_name_idn
 * @property string|null $button_link
 * @property string|null $image
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read mixed $translate_button_name
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Slider active()
 * @method static \Database\Factories\SliderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Query\Builder|Slider onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereButtonLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereButtonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereButtonNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Slider withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Slider withoutTrashed()
 * @mixin \Eloquent
 */
	class Slider extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Testimony
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $graduate
 * @property string|null $image
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony active()
 * @method static \Database\Factories\TestimonyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony newQuery()
 * @method static \Illuminate\Database\Query\Builder|Testimony onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony query()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereGraduate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimony whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Testimony withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Testimony withoutTrashed()
 * @mixin \Eloquent
 */
	class Testimony extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TuitionFee
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_idn
 * @property string|null $description
 * @property string|null $description_idn
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee active()
 * @method static \Database\Factories\TuitionFeeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee newQuery()
 * @method static \Illuminate\Database\Query\Builder|TuitionFee onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee query()
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TuitionFee whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|TuitionFee withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TuitionFee withoutTrashed()
 * @mixin \Eloquent
 */
	class TuitionFee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $username
 * @property string|null $password
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property \Illuminate\Support\Carbon|null $phone_verified_at
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read User|null $createdBy
 * @property-read User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|User active()
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Value
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_idn
 * @property string|null $description
 * @property string|null $description_idn
 * @property string|null $icon
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Value active()
 * @method static \Database\Factories\ValueFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Value inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Value newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Value newQuery()
 * @method static \Illuminate\Database\Query\Builder|Value onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Value query()
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Value withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Value withoutTrashed()
 * @mixin \Eloquent
 */
	class Value extends \Eloquent {}
}

