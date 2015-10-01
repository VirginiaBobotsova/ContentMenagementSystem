<?php
class EventsModel extends BaseModel {

    public function getAll() {
        $statement = self::$db->query("SELECT * FROM events");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getFilteredEvents($from, $size) {
        $statement = self::$db->prepare("SELECT * FROM events LIMIT ?, ?");
        $statement->bind_param("ii", $from, $size);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }


    public function find($id) {
        $statement = self::$db->prepare(
            "SELECT * FROM events WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    public function create($name, $image, $comment, $text) {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO events VALUES(NULL, ?, ?, ?, ?)");
        $statement->bind_param("sbss", $name, $image, $comment, $text);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function edit($id, $name, $image, $comment, $text) {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "UPDATE events SET name = ?, image = ?, comment = ?, text = ? WHERE id = ?");
        $statement->bind_param("sbssi", $name, $image, $comment, $text, $id);
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
