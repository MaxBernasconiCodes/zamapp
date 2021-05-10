<input
    type="checkbox" name="is_admin" id="is_admin"
    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
     {{ $user->is_admin ? 'checked' : '' }}>
