<?php
function abcfsl_txta_reqired( $id, $suffix='' ) {
    $txt = abcfsl_txta( $id, $suffix );
    return $txt . '<b class="abcflRed abcflFontS14"> *</b>';
}
