<?php
class EventsModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query("SELECT * FROM events");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
        $statement = self::$db->prepare(
            "SELECT * FROM events WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    public function create($name, $image, $comment) {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO events VALUES(NULL, ?, ?, ?)");
        $statement->bind_param("sbs", $name, $image, $comment);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function edit($id, $name, $image, $comment) {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "UPDATE events SET name = ?, image = ?, comment = ? WHERE id = ?");
        $statement->bind_param("sbsi", $name, $image, $comment, $id);
        $statement->execute();
        return $statement->errno == 0;
    }

    public function delete($id) {
        $statement = self::$db->prepare(
            "DELETE FROM events WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}
