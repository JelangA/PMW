import 'dart:developer';
import 'package:flutter/material.dart';
import 'package:frontend/models/generic_response_model.dart';
import 'package:frontend/models/workshop_model.dart';
import 'package:frontend/services/workshop_service.dart';

class WorkshopProvider with ChangeNotifier {
  final _workshopService = WorkshopService();
  GenericResponseModel<List<WorkshopModel>>? _workshopModel;
  GenericResponseModel<List<WorkshopModel>>? get workshopModel => _workshopModel;
  bool _isLoading = false;
  bool get isLoading => _isLoading;
  int? _workshopId;
  int? get workshopId => _workshopId;

  void setLoading(bool value) {
    _isLoading = value;
    notifyListeners();
  }

  void setSelectedWorkshop(int? value) {
    _workshopId = value;
    notifyListeners();
  }

  Future<bool> getAllWorkshop() async {
    try {
      setLoading(true);

      final data = await _workshopService.getAllWorkshop();

      _workshopModel = data;

      setLoading(false);

      if (_workshopModel?.metadata?.code == 200) {
        return true;
      } else {
        return false;
      }
    } catch (e) {
      setLoading(false);
      log("Error Get All Workshop Provider: $e");
      throw Exception();
    }
  }
}
