<div>
    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $item->name ?? '' }}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" required>{{ $item->description ?? '' }}</textarea>
    </div>
    <div class="mb-3">
        <label for="date_field" class="form-label">Date</label>
        <input type="date" class="form-control" id="date_field" name="date_field" value="{{ $item->date_field ?? '' }}" required>
    </div>
    <button type="submit" class="btn btn-primary">{{$buttonText}}</button>
</div>
