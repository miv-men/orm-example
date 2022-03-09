<?php
namespace Bp\Template;

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\ORM\Data\DataManager,
    Bitrix\Main\ORM\Fields\DatetimeField,
    Bitrix\Main\ORM\Fields\IntegerField,
    Bitrix\Main\ORM\Fields\StringField,
    Bitrix\Main\ORM\Fields\TextField,
    Bitrix\Main\ORM\Fields\Validators\LengthValidator;

Loc::loadMessages(__FILE__);

/**
 * Class ExampleTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> STATUS string(2) mandatory
 * <li> TIMESTAMP_X datetime mandatory
 * <li> RC_NAME string(255) mandatory
 * <li> RC_EMAIL string(255) mandatory
 * <li> RC_PHOTO string(255) mandatory
 * <li> PARENT_ID int mandatory
 * <li> LEVEL int mandatory
 * <li> REVIEW text mandatory
 * <li> RC_PLUS int mandatory
 * <li> RC_MINUS int mandatory
 * </ul>
 *
 * @package Bp\Template
 **/

class ReviewsCommentTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'bp_reviews_comment';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return [
            new IntegerField(
                'ID',
                [
                    'primary' => true,
                    'autocomplete' => true,
                    'title' => Loc::getMessage('COMMENT_ENTITY_ID_FIELD')
                ]
            ),
            new StringField(
                'STATUS',
                [
                    'default' => 'N',
                    'validation' => [__CLASS__, 'validateStatus'],
                    'title' => Loc::getMessage('COMMENT_ENTITY_STATUS_FIELD')
                ]
            ),
            new DatetimeField(
                'TIMESTAMP_X',
                [
                    'default' => function()
                    {
                        return new DateTime();
                    },
                    'title' => Loc::getMessage('COMMENT_ENTITY_TIMESTAMP_X_FIELD')
                ]
            ),
            new StringField(
                'RC_NAME',
                [
                    'validation' => [__CLASS__, 'validateRcName'],
                    'title' => Loc::getMessage('COMMENT_ENTITY_RC_NAME_FIELD')
                ]
            ),
            new StringField(
                'RC_EMAIL',
                [
                    'validation' => [__CLASS__, 'validateRcEmail'],
                    'title' => Loc::getMessage('COMMENT_ENTITY_RC_EMAIL_FIELD')
                ]
            ),
            new StringField(
                'RC_PHOTO',
                [
                    'validation' => [__CLASS__, 'validateRcPhoto'],
                    'title' => Loc::getMessage('COMMENT_ENTITY_RC_PHOTO_FIELD')
                ]
            ),
            new IntegerField(
                'PARENT_ID',
                [
                    'title' => Loc::getMessage('COMMENT_ENTITY_PARENT_ID_FIELD')
                ]
            ),
            new IntegerField(
                'LEVEL',
                [
                    'title' => Loc::getMessage('COMMENT_ENTITY_LEVEL_FIELD')
                ]
            ),
            new TextField(
                'REVIEW',
                [
                    'title' => Loc::getMessage('COMMENT_ENTITY_REVIEW_FIELD')
                ]
            ),
            new IntegerField(
                'RC_PLUS',
                [
                    'default' => 0,
                    'title' => Loc::getMessage('COMMENT_ENTITY_RC_PLUS_FIELD')
                ]
            ),
            new IntegerField(
                'RC_MINUS',
                [
                    'default' => 0,
                    'title' => Loc::getMessage('COMMENT_ENTITY_RC_MINUS_FIELD')
                ]
            ),
        ];
    }

    /**
     * Returns validators for STATUS field.
     *
     * @return array
     */
    public static function validateStatus()
    {
        return [
            new LengthValidator(null, 2),
        ];
    }

    /**
     * Returns validators for RC_NAME field.
     *
     * @return array
     */
    public static function validateRcName()
    {
        return [
            new LengthValidator(null, 255),
        ];
    }

    /**
     * Returns validators for RC_EMAIL field.
     *
     * @return array
     */
    public static function validateRcEmail()
    {
        return [
            new LengthValidator(null, 255),
        ];
    }

    /**
     * Returns validators for RC_PHOTO field.
     *
     * @return array
     */
    public static function validateRcPhoto()
    {
        return [
            new LengthValidator(null, 255),
        ];
    }
}
