myApp.factory('galleryModel', ['$http', function($http) {
    return {
        saveGallery: function(galleryData) {
            return $http({
                headers: {
                    'Content-Type': 'application/json'
                },
                url: baseUrl + 'galeri',
                method: "POST",
                data: {
                    name: galleryData.name
                }
            });
        },
        getAllGalleries: function() {
            return $http.get(baseUrl + 'galeri');
        },
        getGalleryById: function(id) {
            return $http.get(baseUrl + 'galeri/' + id);
        }
    };
}])