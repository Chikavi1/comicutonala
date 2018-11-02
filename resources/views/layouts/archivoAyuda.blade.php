<script>
	
   $category = $request->input('category');

    //now get all user and services in one go without looping using eager loading
    //In your foreach() loop, if you have 1000 users you will make 1000 queries

    $users = User::with('services', function($query) use ($category) {
         $query->where('category', 'LIKE', '%' . $category . '%');
    })->get();
</script>