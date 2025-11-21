# TODO List for Enhancing Laravel Pet Adoption Application

## 1. Update Layout to Use Bootstrap CDN
- [x] Modify resources/views/layouts/app.blade.php to use Bootstrap CDN instead of local assets.

## 2. Modify Views to Extend Layout and Add CRUD Forms
- Update resources/views/home/index.blade.php to extend layout.
- Update resources/views/pets/index.blade.php to extend layout and add CRUD forms (create, edit, delete).
- Update resources/views/adopters/index.blade.php to extend layout and add CRUD forms.
- Update resources/views/adoptions/index.blade.php to extend layout and add CRUD forms.
- Create additional views for create, edit, show if needed.

## 3. Enhance Controllers with Full CRUD Methods
- Add CRUD methods (create, store, show, edit, update, destroy) to PetController.php.
- Add CRUD methods to AdopterController.php.
- Add CRUD methods to AdoptionController.php.

## 4. Add CRUD Routes
- Update routes/web.php to include all CRUD routes for pets, adopters, adoptions.

## 5. Ensure Database Connection and Migrations
- Verify database configuration.
- Run migrations if not already done.

## Followup Steps
- Run seeders to populate data.
- Test CRUD functionality.
