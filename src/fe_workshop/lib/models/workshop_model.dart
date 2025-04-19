class WorkshopModel {
  int? id;
  String? title,
      description,
      startTime,
      endTime,
      location,
      createdAt,
      updatedAt;

  WorkshopModel({
    required this.id,
    required this.title,
    required this.description,
    required this.startTime,
    required this.endTime,
    required this.location,
    required this.createdAt,
    required this.updatedAt,
  });

  factory WorkshopModel.fromJson(Map<String, dynamic> data) {
    return WorkshopModel(
      id: data['workshop_id'],
      title: data['title'],
      description: data['description'],
      startTime: data['start_time'],
      endTime: data['end_time'],
      location: data['location'],
      createdAt: data['created_at'],
      updatedAt: data['updated_at'],
    );
  }
}
