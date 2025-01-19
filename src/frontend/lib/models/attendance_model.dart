class AttendanceModel {
  int? code, id, workshopId;
  String? status, message, nim, checkInTime, checkOutTime, createdAt, updatedAt;

  AttendanceModel({
    required this.code,
    required this.status,
    required this.message,
    required this.id,
    required this.nim,
    required this.checkInTime,
    required this.checkOutTime,
    required this.createdAt,
    required this.updatedAt,
    required this.workshopId,
  });

  factory AttendanceModel.fromJson(Map<String, dynamic> object) {
    var metadata = object['metadata'];
    var data = object['data'];

    if (data == null) {
      return AttendanceModel(
        code: metadata['code'],
        status: metadata['status'],
        message: metadata['message'],
        id: null,
        nim: null,
        checkInTime: null,
        checkOutTime: null,
        createdAt: null,
        updatedAt: null,
        workshopId: null,
      );
    }

    return AttendanceModel(
      code: metadata['code'],
      status: metadata['status'],
      message: metadata['message'],
      id: int.tryParse(data['attendance_id']?.toString() ?? '') ?? 0,
      nim: data['student'] ?? '',
      checkInTime: data['check_in_time'],
      checkOutTime: data['check_out_time'],
      createdAt: data['created_at'] ?? '',
      updatedAt: data['updated_at'] ?? '',
      workshopId: int.tryParse(data['workshop_id']?.toString() ?? '') ?? 0,
    );
  }
}
