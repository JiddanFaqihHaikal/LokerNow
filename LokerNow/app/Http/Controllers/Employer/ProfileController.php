<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the employer profile edit form.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        $companyProfile = $user->companyProfile;
        
        if (!$companyProfile) {
            // Create a new company profile if one doesn't exist
            $companyProfile = new CompanyProfile();
            $companyProfile->user_id = $user->id;
            $companyProfile->name = $user->name . "'s Company"; // Default name
            $companyProfile->save();
            
            // Update the user with the new company profile
            $user->company_profile_id = $companyProfile->id;
            $user->save();
        }
        
        return view('employer.profile.edit', compact('companyProfile'));
    }
    
    /**
     * Update the employer profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $companyProfile = $user->companyProfile;
        
        if (!$companyProfile) {
            return redirect()->route('employer.profile.edit')
                ->with('error', 'Company profile not found.');
        }
        
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'tagline' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);
        
        // Update company profile
        $companyProfile->name = $request->name;
        $companyProfile->website = $request->website;
        $companyProfile->tagline = $request->tagline;
        
        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($companyProfile->logo_path) {
                Storage::delete('public/' . $companyProfile->logo_path);
            }
            
            $logoPath = $request->file('logo')->store('uploads/company/logos', 'public');
            $companyProfile->logo_path = $logoPath;
        }
        
        // Handle banner upload
        if ($request->hasFile('banner')) {
            // Delete old banner if exists
            if ($companyProfile->banner_path) {
                Storage::delete('public/' . $companyProfile->banner_path);
            }
            
            $bannerPath = $request->file('banner')->store('uploads/company/banners', 'public');
            $companyProfile->banner_path = $bannerPath;
        }
        
        $companyProfile->save();
        
        return redirect()->route('employer.profile.edit')
            ->with('success', 'Company profile updated successfully.');
    }
}
