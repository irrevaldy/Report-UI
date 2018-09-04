
======USER======

PRIV A

@if ( in_array('USER_A', $priv) || Session::get('user_subgroup_id') == '1' )


PRIV E

@if ( in_array('USER_E', $priv) || Session::get('user_subgroup_id') == '1' )


PRIV D

@if ( in_array('USER_D', $priv) || Session::get('user_subgroup_id') == '1' )



======SUBGROUP======

PRIV A

@if ( in_array('SUBGROUP_A ', $priv) || Session::get('user_subgroup_id') == '1' )

PRIV E

@if ( in_array('SUBGROUP_E', $priv) || Session::get('user_subgroup_id') == '1' )


PRIV D

@if ( in_array('SUBGROUP_D', $priv) || Session::get('user_subgroup_id') == '1' )



======GROUP======

PRIV A

@if ( in_array('GROUP_A ', $priv) || Session::get('user_subgroup_id') == '1' )

PRIV E

@if ( in_array('GROUP_E', $priv) || Session::get('user_subgroup_id') == '1' )


PRIV D

@if ( in_array('GROUP_D', $priv) || Session::get('user_subgroup_id') == '1' )



======PACKAGE======

PRIV A

@if ( in_array('PACKAGE_A', $priv) || Session::get('user_subgroup_id') == '1' )

PRIV E

@if ( in_array('PACKAGE_E', $priv) || Session::get('user_subgroup_id') == '1' )


PRIV D

@if ( in_array('PACKAGE_D', $priv) || Session::get('user_subgroup_id') == '1' )



======FILTER TYPE======

PRIV A

@if ( in_array('FILTER_TYPE_A', $priv) || Session::get('user_subgroup_id') == '1' )

PRIV E

@if ( in_array('FILTER_TYPE_E', $priv) || Session::get('user_subgroup_id') == '1' )


PRIV D

@if ( in_array('FILTER_TYPE_D', $priv) || Session::get('user_subgroup_id') == '1' )