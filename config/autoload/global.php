<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    /**
     * Bcrypt cost.
     *
     * DO NOT CHANGE THE PASSWORD HASH SETTINGS FROM THEIR DEFAULTS
     * Unless A) you have done sufficient research and fully understand exactly
     * what you are changing, AND B) you have a very specific reason to deviate
     * from the default settings and know what you're doing.
     *
     * The password hash settings may be changed at any time without
     * invalidating existing user accounts.
     *
     * The number represents the base-2 logarithm of the iteration count used for
     * hashing. Default is 13 (about 20 hashes per second on an i5).
     */
    'bcrypt_cost' => 13,

    /**
     * Exam and Summary upload directory configration.
     */
    'education' => array(
        'upload_dir' => 'public/data/education',
        'public_dir' => 'data/education',
        'dir_mode' => 0777, // rwx by default
    ),

    /**
     * Meeting notes upload directory configration.
     */
    'meeting-notes' => array(
        'upload_dir' => 'public/data/meeting-notes',
        'public_dir' => 'data/meeting-notes',
        'dir_mode' => 0777, // rwx by default
    ),

    /**
     * Meeting documents upload directory.
     */
    'meeting-documents' => array(
        'upload_dir' => 'public/data/meeting-documents',
        'public_dir' => 'data/meeting-documents',
        'dir_mode' => 0777, // rwx by default
    ),

    /**
     * Dreamspark configuration.
     */
    'dreamspark' => array(
        'url' => 'https://e5.onthehub.com/WebStore/Security/AuthenticateUser.aspx?account=%ACCOUNT%&username=%EMAIL%&key=%KEY%&academic_statuses=%GROUPS%',
        // configured locally
        'account' => '',
        'key' => ''
    ),

    /**
     * CA Path for SSL certificates, override this locally if necessary.
     */
    'sslcapath' => '/etc/ssl/certs',

    /**
     * Photo's upload directory configuration
     */
    'photo' => array(
        'upload_dir' => 'public/data/photo',
        'public_dir' => 'data/photo',
        'max_photos_page' => 20,
        'dir_mode' => 0777, // rwx by default
        'small_thumb_size' => array(
            'width' => 370,
            'height' => 550
        ),
        'large_thumb_size' => array(
            'width' => 825,
            'height' => 550
        ),
        'album_cover' => array(
            'width' => 370,
            'height' => 550,
            'inner_border' => 2,
            'outer_border' => 0,
            'cols' => 2,
            'rows' => 2,
            'background' => '#000000'
        )
    ),

    'frontpage' => array(
        'activity_count' => 3 // Number of activities to display
    ),
    
    /**
     * OASE SOAP API configuration.
     *
     * Please not that it is impossible to use this API without a whitelisted
     * IP. Hence, it is only possible to use this on the GEWIS server. In 2013
     * we communicated with STU about using this API, instead of trying to
     * pull the information from OASE via HTTP. Which would lead to
     * impracticalities on our side, and a slow OASE at times on the side of
     * Dienst ICT.
     */
    'oase' => array(
        'soap' => array(
            'wsdl' => 'http://dlwtbiz.campus.test.tue.nl/ESB/ESB_ESB_DLWO_ESB_ReceivePort.svc?wsdl',
            'options' => array(
                'classmap' => array(
                    'Vraag' => 'Education\Oase\Vraag',
                    'Property' => 'Education\Oase\Property',
                    'Antwoord' => 'Education\Oase\Antwoord'
                ),
                'soap_version' => SOAP_1_1
            )
        ),
        /**
         * Filters for studies
         */
        'studies' => array(
            /**
             * Studies of W&I will have these keywords.
             *
             * Only studies with these keywords will be considered.
             */
            'keywords' => array(
                "software science",
                "web science",
                "wiskunde",
                "informatica",
                "mathematics",
                "finance and risk",
                "information security technology",
                "(eit-sde)",
                "computational science and engineering",
                "statistics, probability, and operations research",
                "computer",
                "security",
                "business information systems",
                "embedded systems"
            ),
            /**
             * Negative keywords.
             *
             * Studies with these keywords will not be considered W&I studies.
             */
            'negative_keywords' => array(
                'leraar',
                'natuurkunde'
            ),
            /**
             * Group ID's.
             *
             * Only studies with these group ID's will be considered.
             */
            'group_ids' => array(
                100, // diverse masters
                110, // schakelprogramma's
                150, // minoren
                155, // HBO-minor
                200, // bachelor (pre-bachelor-college)
                210, // regulier onderwijs (incl. master)
                212, // coherente keuzepakketten wss
            ),
            /**
             * Education types
             */
            'education_types' => array(
                'master',
                'bachelor'
            )
        )
    )
);
