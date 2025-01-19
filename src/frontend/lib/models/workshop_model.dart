class WorkshopModel {
  int? code, id;
  String? status,
      message,
      title,
      description,
      startTime,
      endTime,
      location,
      createdAt,
      updatedAt;

  WorkshopModel({
    required this.code,
    required this.status,
    required this.message,
    required this.id,
    required this.title,
    required this.description,
    required this.startTime,
    required this.endTime,
    required this.location,
    required this.createdAt,
    required this.updatedAt,
  });

  factory WorkshopModel.fromJson(
      Map<String, dynamic> metadata, Map<String, dynamic> data) {
    return WorkshopModel(
      code: metadata['code'],
      status: metadata['status'],
      message: metadata['message'],
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
