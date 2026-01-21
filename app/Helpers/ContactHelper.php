<?php

if (!function_exists('format_phone_number')) {
    /**
     * Format phone number to 021-xxxxxxx format (always starts with 0)
     */
    function format_phone_number($number)
    {
        if (empty($number)) {
            return '';
        }
        
        // Remove all non-digit characters
        $cleanNumber = preg_replace('/[^0-9]/', '', $number);
        
        // If starts with 62, remove it
        if (substr($cleanNumber, 0, 2) === '62') {
            $cleanNumber = substr($cleanNumber, 2);
        }
        
        // Ensure starts with 0
        if (substr($cleanNumber, 0, 1) !== '0') {
            $cleanNumber = '0' . $cleanNumber;
        }
        
        // If number is already in format 021-xxxxxxx, return as is
        if (preg_match('/^0\d{2,3}-\d+$/', $cleanNumber)) {
            return $cleanNumber;
        }
        
        // Now we have number starting with 0
        // Format as 021-xxxxxxx
        // Pattern: 0 + area code (2-3 digits) + rest of number
        
        // Try Jakarta area codes first (021, 022, etc.)
        // Pattern: 0 + 2[1-9] + 7+ digits
        if (preg_match('/^0(2[1-9])(\d{7,})$/', $cleanNumber, $matches)) {
            // Jakarta: 021-, 022-, etc.
            // Example: 02129098991 -> 0 + 21 + - + 29098991 = 021-29098991
            return '0' . $matches[1] . '-' . $matches[2];
        }
        
        // Try other 2-digit area codes (like 031 for Surabaya, 061 for Medan, etc.)
        // Pattern: 0 + 2 digits + 7+ digits
        if (preg_match('/^0(\d{2})(\d{7,})$/', $cleanNumber, $matches)) {
            return '0' . $matches[1] . '-' . $matches[2];
        }
        
        // Try 3-digit area codes (for smaller cities)
        // Pattern: 0 + 3 digits + 6+ digits
        if (preg_match('/^0(\d{3})(\d{6,})$/', $cleanNumber, $matches)) {
            return '0' . $matches[1] . '-' . $matches[2];
        }
        
        // Fallback: return with 0 prefix
        return $cleanNumber;
    }
}

if (!function_exists('format_whatsapp_number')) {
    /**
     * Format WhatsApp number to 08xx xxxx xxxx format
     */
    function format_whatsapp_number($number)
    {
        if (empty($number)) {
            return '';
        }
        
        // Remove all non-digit characters
        $number = preg_replace('/[^0-9]/', '', $number);
        
        // If starts with 62, replace with 0
        if (substr($number, 0, 2) === '62') {
            $number = '0' . substr($number, 2);
        }
        
        // Ensure starts with 0
        if (substr($number, 0, 1) !== '0') {
            $number = '0' . $number;
        }
        
        // Format as 08xx xxxx xxxx (10 digits after 0)
        // Pattern: 0 + 2 digits + 4 digits + 4 digits
        if (preg_match('/^0(\d{2})(\d{4})(\d{4})$/', $number, $matches)) {
            return '0' . $matches[1] . ' ' . $matches[2] . ' ' . $matches[3];
        }
        // Alternative: 0 + 3 digits + 3 digits + 4 digits (for some numbers)
        elseif (preg_match('/^0(\d{3})(\d{3})(\d{4})$/', $number, $matches)) {
            return '0' . $matches[1] . ' ' . $matches[2] . ' ' . $matches[3];
        }
        
        // Fallback: return as is if can't format
        return $number;
    }
}

if (!function_exists('get_whatsapp_link')) {
    /**
     * Get WhatsApp link from number
     */
    function get_whatsapp_link($number)
    {
        // Remove all non-digit characters
        $number = preg_replace('/[^0-9]/', '', $number);
        
        // If starts with 0, replace with 62
        if (substr($number, 0, 1) === '0') {
            $number = '62' . substr($number, 1);
        }
        
        // If doesn't start with 62, add it
        if (substr($number, 0, 2) !== '62') {
            $number = '62' . $number;
        }
        
        return 'https://api.whatsapp.com/send?phone=' . $number;
    }
}
