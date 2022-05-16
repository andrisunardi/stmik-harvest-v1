<?php

return [
    "Looks Good" => "Looks Good",
    "Please Fill In Correctly" => "Please Fill In Correctly",

    "accepted"        => "The :attribute must be accepted.",
    "accepted_if"     => "The :attribute must be accepted when :other is :value.",
    "active_url"      => "The :attribute is not a valid URL.",
    "after"           => "The :attribute must be a date after time :date.",
    "after_or_equal"  => "The :attribute must be a date after or equal to :date.",
    "alpha"           => "The :attribute must only contain letters.",
    "alpha_dash"      => "The :attribute must only contain letters, numbers, dashes and underscores.",
    "alpha_num"       => "The :attribute must only contain letters and numbers.",
    "array"           => "The :attribute must be an array.",
    "before"          => "The :attribute must be a date before :date.",
    "before_or_equal" => "The :attribute must be a date before or equal to :date.",
    "between" => [
        "numeric" => "The :attribute must be between :min and :max.",
        "file"    => "The :attribute must be between :min and :max kilobytes.",
        "string"  => "The :attribute must be between :min and :max characters.",
        "array"   => "The :attribute must have between :min and :max items.",
    ],
    "boolean"           => "The :attribute must be true or false",
    "confirmed"         => "The :attribute confirmation does not match.",
    "current_password"  => "The password is incorrect.",
    "date"              => "The :attribute is not a valid date.",
    "date_equals"       => "The :attribute must be a date equal to :date.",
    "date_format"       => "The :attribute does not match the format :format.",
    "declined"          => "The :attribute under validation must be no, off, 0 or false.",
    "declined_if"       => "The :attribute under validation must be no, off, 0 or false when :other is :value..",
    "different"         => "The :attribute and :other must be different.",
    "digits"            => "The :attribute must be :digits digits.",
    "digits_between"    => "The :attribute must be between :min and :max digits.",
    "dimensions"        => "The :attribute has invalid image dimensions",
    "distinct"          => "The :attribute field has a duplicate value.",
    "email"             => "The :attribute must be a valid email address.",
    "ends_with"         => "The :attribute must end with one of the following: :values",
    "enum"              => "The value you have provided is not a valid enum instance",
    "exclude"           => "The :attribute is excluded.",
    "exclude_if"        => "The :attribute is excluded when :other is :value.",
    "exclude_unless"    => "The :attribute is excluded unless :other is in :values.",
    "exclude_with"      => "The :attribute is excluded when :values is present.",
    "exclude_without"   => "The :attribute is excluded when :values is not present.",
    "exists"            => "The selected :attribute is invalid.",
    "file"              => "The :attribute must be a file.",
    "filled"            => "The :attribute field must have a value.",
    "gt" => [
        "numeric" => "The :attribute must be greater than :value.",
        "file"    => "The :attribute must be greater than :value kilobytes.",
        "string"  => "The :attribute must be greater than :value characters.",
        "array"   => "The :attribute must have more than :value items.",
    ],
    "gte" => [
        "numeric" => "The :attribute must be greater than or equal :value.",
        "file"    => "The :attribute must be greater than or equal :value kilobytes.",
        "string"  => "The :attribute must be greater than or equal :value characters.",
        "array"   => "The :attribute must have more than or equal :value items.",
    ],
    "image"    => "The :attribute must be an image.",
    "in"       => "The selected :attribute is invalid.",
    "in_array" => "The :attribute field does not exist in :other.",
    "integer"  => "The :attribute must be an integer.",
    "ip"       => "The :attribute must be a valid IP address.",
    "ipv4"     => "The :attribute must be a valid IPv4 address.",
    "ipv6"     => "The :attribute must be a valid IPv6 address.",
    "json"     => "The :attribute must be a valid JSON string.",
    "lt" => [
        "numeric" => "The :attribute must be less than :value.",
        "file"    => "The :attribute must be less than :value kilobytes.",
        "string"  => "The :attribute must be less than :value characters.",
        "array"   => "The :attribute must have less than :value items.",
    ],
    "lte" => [
        "numeric" => "The :attribute must be less than or equal :value.",
        "file"    => "The :attribute must be less than or equal :value kilobytes.",
        "string"  => "The :attribute must be less than or equal :value characters.",
        "array"   => "The :attribute must have less than or equal :value items.",
    ],
    "mac_address" => "The :attribute must be a valid Mac Address.",
    "max" => [
        "numeric" => "The :attribute must not be greater than :max.",
        "file"    => "The :attribute must not be greater than :max kilobytes.",
        "string"  => "The :attribute must not be greater than :max characters.",
        "array"   => "The :attribute must not have more than :max items.",
    ],
    "mimes"     => "The :attribute must be a file of type: :values.",
    "mimetypes" => "The :attribute must be a file of type: :values.",
    "min"       => [
        "numeric" => "The :attribute must be at least :min.",
        "file"    => "The :attribute must be at least :min kilobytes.",
        "string"  => "The :attribute must be at least :min characters.",
        "array"   => "The :attribute must have at least :min items.",
    ],
    "multiple_of"          => "The :attribute must be a multiple of :value.",
    "not_in"               => "The selected :attribute is invalid.",
    "not_regex"            => "The :attribute format is invalid.",
    "nullable"             => "The :attribute may be null.",
    "numeric"              => "The :attribute must be a number.",
    "password"             => "Password is invalid.",
    "present"              => "The :attribute field must be present.",
    "prohibited"           => "The :attribute field is prohibited.",
    "prohibited_if"        => "The :attribute field is prohibited when :other is :value.",
    "prohibited_unless"    => "The :attribute field is prohibited unless :other is in :values.",
    "prohibits"            => "The :attribute field prohibits :values from being present.",
    "regex"                => "The :attribute format is invalid.",
    "required"             => "The :attribute field is required.",
    "required_if"          => "The :attribute field is required when :other is :value.",
    "required_unless"      => "The :attribute field is required unless :other is in :values.",
    "required_with"        => "The :attribute field is required when :values is present.",
    "required_with_all"    => "The :attribute field is required when :values are present.",
    "required_without"     => "The :attribute field is required when :values is not present.",
    "required_without_all" => "The :attribute field is required when none of :values are present.",
    "required_array_keys"  => "The :attribute must be an array and must contain at least the specified keys.",
    "same"                 => "The :attribute and :other must match.",
    "size" => [
        "numeric" => "The :attribute must be :size.",
        "file"    => "The :attribute must be :size kilobytes.",
        "string"  => "The :attribute must be :size characters.",
        "array"   => "The :attribute must contain :size items.",
    ],
    "starts_with" => "The :attribute must start with one of following: :values",
    "string"      => "The :attribute must be a string.",
    "timezone"    => "The :attribute must be a valid timezone.",
    "unique"      => "The :attribute has already been taken.",
    "uploaded"    => "The :attribute failed to upload.",
    "url"         => "The :attribute must be a valid URL.",
    "uuid"        => "The :attribute must be a valid UUID.",

    "attributes" => [
        "per_page" => "Per Page",
        "order_by" => "Order By",
        "sort_by" => "Sort By",
        "start_created_at" => "Start Created At",
        "end_created_at" => "End Created At",
        "start_updated_at" => "Start Updated At",
        "end_updated_at" => "End Updated At",
        "start_deleted_at" => "Start Deleted At",
        "end_deleted_at" => "End Deleted At",

        "current_password" => "Current Password",
        "new_password" => "New Password",
        "confirm_password" => "Confirm Password",

        "confirm_reset" => "Confirm Reset",

        "preview_image" => "Preview Image",
        "preview_file" => "Preview File",
        "preview_pdf" => "Preview PDF",
        "preview_video" => "Preview Video",
        "preview_website" => "Preview Website",

        "line" => "Line",
        "bbm" => "BBM",
        "google" => "Google",

        "abstract" => "Abstract",
        "access" => "Access",
        "active" => "Active",
        "activity" => "Activity",
        "add" => "Add",
        "address" => "Address",
        "admin" => "Admin",
        "button_link" => "Button Link",
        "button_name" => "Button Name",
        "button_name_id" => "Button Name ID",
        "call" => "Call",
        "category" => "Category",
        "code" => "Code",
        "company" => "Company",
        "corporate_author" => "Corporate Author",
        "course" => "Course",
        "created_at" => "Created At",
        "created_by" => "Created By",
        "date" => "Date",
        "degree" => "Degree",
        "delete" => "Delete",
        "deleted_at" => "Deleted At",
        "deleted_by" => "Deleted By",
        "description" => "Description",
        "description_id" => "Description ID",
        "duration" => "Duration",
        "edit" => "Edit",
        "email" => "Email",
        "exception" => "Exception",
        "facebook" => "Facebook",
        "failed_at" => "Failed At",
        "faq_category" => "Faq Category",
        "fax" => "Fax",
        "file" => "File",
        "first_name" => "First Name",
        "first_page" => "First Page",
        "google_maps" => "Google Maps",
        "google_maps_iframe" => "Google Maps Iframe",
        "graduate" => "Graduate",
        "icon" => "Icon",
        "id" => "ID",
        "image" => "Image",
        "instagram" => "Instagram",
        "issue" => "Issue",
        "job" => "Job",
        "journal_title" => "Journal Title",
        "keyword" => "Keyword",
        "last_name" => "Last Name",
        "last_page" => "Last Page",
        "lecturer" => "Lecturer",
        "linkedin" => "Linkedin",
        "menu_category" => "Menu Category",
        "menu" => "Menu",
        "message" => "Message",
        "mission" => "Mission",
        "mission_id" => "Mission ID",
        "name" => "Name",
        "name_id" => "Name ID",
        "news_category" => "News Category",
        "news" => "News",
        "page" => "Page",
        "password" => "Password",
        "payload" => "Payload",
        "phone" => "Phone",
        "price" => "Price",
        "public" => "Public",
        "publication_date" => "Publication Date",
        "publisher" => "Publisher",
        "queue" => "Queue",
        "remember_token" => "Remember Token",
        "repository" => "Repository",
        "repository_subject" => "Repository Subject",
        "repository_subject_id" => "Repository Subject",
        "role" => "Role",
        "row" => "Row",
        "scholar" => "Scholar",
        "semester" => "Semester",
        "sks" => "SKS",
        "slug" => "Slug",
        "sms" => "SMS",
        "sort" => "Sort",
        "status" => "Status",
        "study_program_category" => "Study Program Category",
        "study_program" => "Study Program",
        "tag" => "Tag",
        "tag_id" => "Tag ID",
        "title" => "Title",
        "twitter" => "Twitter",
        "updated_at" => "Updated At",
        "updated_by" => "Updated By",
        "url" => "URL",
        "user" => "User",
        "username" => "Username",
        "uuid" => "UUID",
        "video" => "Video",
        "view" => "View",
        "vision" => "Vision",
        "vision_id" => "Vision ID",
        "volume" => "Volume",
        "whatsapp" => "Whatsapp",
        "year" => "Year",
        "youtube" => "Youtube",

        "vision" => "Vision",
        "mission" => "Mission",
        "history" => "History",
        "youtube" => "Youtube",
        "youtube" => "Youtube",

        "gender" => "Gender",
        "school" => "School",
        "major" => "Major",
        "city" => "City",
        "type" => "Type",
    ],

    "values" => [
        "payment_type" => [
            "cc" => "credit card"
        ],
    ],
];
