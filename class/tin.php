<?php
require_once "goc.php";
class tin extends goc
{

    function TinNoiBat($from, $sotin, $lang)
    {
        $sql = "SELECT idTin,TieuDe, Ngay, TomTat,
            urlHinh,loaitin.Ten as TenLT, TieuDe_KhongDau, Ten_KhongDau
            FROM tin,loaitin
            WHERE tin.idLT=loaitin.idLT 
            AND tin.AnHien=1 AND TinNoiBat=1
            AND tin.lang='$lang'
            ORDER BY idTin DESC LIMIT $from, $sotin";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } //end function TinNoiBat

    function TinMoi($from, $sotin, $lang)
    {
        $sql = "SELECT idTin,TieuDe, Ngay, TomTat,
            urlHinh,loaitin.Ten as TenLT, TieuDe_KhongDau, Ten_KhongDau, SoLanXem
            FROM tin,loaitin
            WHERE tin.idLT=loaitin.idLT 
            AND tin.AnHien=1 
            AND tin.lang='$lang'
            ORDER BY idTin DESC LIMIT $from, $sotin";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } //end function TinMoi

    function TinMoiTrong1Loai($idLT, $from, $sotin, $lang)
    {
        $sql = "SELECT idTin,TieuDe, Ngay, TomTat, urlHinh, TieuDe_KhongDau
            FROM tin
            WHERE idLT=$idLT
            AND AnHien=1 AND lang='$lang'
            ORDER BY idTin DESC LIMIT $from, $sotin";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } //end function TinMoiTrong1Loai

    function LayTenLoaiTin($idLT)
    {
        $sql = "SELECT Ten
            FROM loaitin
            WHERE idLT=$idLT";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        if ($kq->num_rows <= 0)  return "";
        $row = $kq->fetch_row();
        $ten = $row[0];
        return $ten;
    } //end function LayTenLoaiTin

    function TinNgauNhien($sotin, $lang)
    {
        $sql = "SELECT idTin,TieuDe, Ngay, TomTat,
            urlHinh,loaitin.Ten as TenLT, TieuDe_KhongDau, Ten_KhongDau
            FROM tin,loaitin
            WHERE tin.idLT=loaitin.idLT 
            AND tin.AnHien=1 
            AND tin.lang='$lang'
            ORDER BY rand() LIMIT 0, $sotin";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } //end function TinNgauNhien

    function ListLoaiTin($lang)
    {
        $sql = "SELECT idLT, Ten as TenLT, Ten_KhongDau
            FROM loaitin
            WHERE lang='$lang' 
            AND AnHien=1 
            ORDER BY ThuTu ";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } //end function ListLoaiTin

    function ListTags($lang)
    {
        $sql = "SELECT idTag, TenTag ,TenTag_KhongDau
            FROM Tags
            WHERE lang='$lang' 
            AND AnHien=1 
            ORDER BY ThuTu ";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } //end function ListTags

    function TinXemNhieu($from, $sotin, $lang)
    {
        $sql = "SELECT idTin,TieuDe, Ngay, TomTat,
            urlHinh,loaitin.Ten as TenLT, TieuDe_KhongDau, Ten_KhongDau
            FROM tin,loaitin
            WHERE tin.idLT=loaitin.idLT 
            AND tin.AnHien=1 
            AND tin.lang='$lang'
            ORDER BY SoLanXem DESC LIMIT $from, $sotin";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } //end function TinXemNhieu

    function TinMoiCoPhanHoi($from, $sotin, $lang)
    {
        $sql = "SELECT idTin,TieuDe, Ngay, TomTat,
            urlHinh,loaitin.Ten as TenLT, TieuDe_KhongDau, Ten_KhongDau
            FROM tin,loaitin
            WHERE tin.idLT=loaitin.idLT 
            AND tin.AnHien=1 
            AND tin.lang='$lang'
            AND idTin in( SELECT DISTINCT idTin From YKien ORDER BY Ngay)
            ORDER BY idTin ASC LIMIT $from, $sotin";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } //end function TinMoiCoPhanHoi

    function ListTheLoai($lang)
    {
        $sql = "SELECT idTL, TenTL
            FROM theloai
            WHERE lang='$lang' 
            AND AnHien=1 
            ORDER BY ThuTu ";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } //end function ListTheLoai

    function ListLoaiTinTrong1TheLoai($idTL)
    {
        $sql = "SELECT idLT, Ten, Ten_KhongDau 
            FROM loaitin
            WHERE AnHien=1 
            AND idTL=$idTL
            ORDER BY ThuTu ";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } //end function ListLoaiTinTrong1TheLoai

    function TinMoiNhan($sotin, $lang)
    {
        $sql = "SELECT idTin,TieuDe, Ngay, TieuDe_KhongDau
            FROM tin
            WHERE idTL=1
            AND lang='$lang'
            LIMIT 0, $sotin";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } //end function TinMoiNhan
    // end  Trang chủ site tin tức (index.php)
    //===========================================
    function ChiTietTin($idTin)
    {
        settype($idTin, "int");
        $sql = " SELECT idTin, TieuDe, TomTat, Ngay, urlHinh, Content, SoLanXem,
            tags, tin.idLT , Ten, tin.idTL, TenTL, TieuDe_KhongDau, Ten_KhongDau
            FROM tin, loaitin, theloai
            WHERE tin.idLT= loaitin.idLT 
            AND loaitin.idTL= theloai.idTL 
            AND idTin= $idTin";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        if ($kq->num_rows <= 0) return FALSE;
        return $kq->fetch_assoc();
    } // end function ChiTietTin

    function CapNhatSolanXemTin($idTin)
    {
        settype($idTin, "int");
        $sql = "UPDATE tin 
        SET SoLanXem=SoLanXem+1 
        WHERE idTin=$idTin";
        $this->db->query($sql);
    } //end function CapNhatSolanXemTin

    function TinCuCungLoai($idTin, $lang, $sotin = 5)
    {
        $sql = "SELECT idTin,TieuDe,TomTat, urlHinh, Ngay, SoLanXem, TieuDe_KhongDau
            FROM tin
            WHERE AnHien=1 
            AND idTin <$idTin
            AND lang='$lang'
            AND idLT = (SELECT idLT FROM tin WHERE idTin=$idTin)
            ORDER BY idTin DESC
            LIMIT 0, $sotin";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } //end function TinCuCungLoai

    function LuuYKien($idTin, $hoten, $email, $noidung, &$loi)
    {
        $loi = "";
        settype($idTin, "int");
        $hoten = $this->db->escape_string(trim(strip_tags($hoten)));
        $email = $this->db->escape_string(trim(strip_tags($email)));
        $noidung = $this->db->escape_string(trim(strip_tags($noidung)));
        if ($hoten == "") $loi .= "Bạn chưa nhập họ tên <br>";
        if ($email == "") $loi .= "Bạn chưa nhập email <br>";
        if ($noidung == "") $loi .= "Bạn chưa nhập nội dung ý kiến <br>";
        if (strlen($noidung) < 10) $loi .= "Nội dung ý kiến quá ngắn<br>";
        if ($loi != "") return false;

        $sql = "INSERT INTO ykien (idTin,HoTen, Email, NoiDung, Ngay)
        VALUES ($idTin,'$hoten', '$email','$noidung', NOW())";

        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } //end function LuuYKien

    function LayCacYKienCua1Tin($idTin)
    {
        $sql = "SELECT idYKien, HoTen, NoiDung, Ngay
        FROM ykien 
        WHERE idTin= $idTin 
        AND AnHien=1
        ORDER BY Ngay DESC";

        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } // end function LayCacYKienCuaTin
    //end Trang chi tiet (chitiettin.php)
    function TinTrongLoai($idLT, $pageNum, $pageSize, &$totalRows)
    {
        $startRows = ($pageNum - 1) * $pageSize;
        $sql = "SELECT idTin, TieuDe, TomTat, urlHinh,Ngay, SoLanXem, TieuDe_KhongDau, SoLanXem
        FROM tin 
        WHERE idLT= $idLT 
        AND AnHien=1
        ORDER BY idTin DESC
        LIMIT $startRows,$pageSize"; // chi lay vai record

        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);

        // dem so record, 2 cau lenh phai giong nhau phan FROM va` WHERE
        $sql = "SELECT count(*) 
        FROM tin 
        WHERE idLT=$idLT
        AND AnHien =1 ";
        $rs = $this->db->query($sql);
        $row_rs = $rs->fetch_row();
        $totalRows = $row_rs[0];
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } //end function TinTrongLoai
    //end tintrongloai.php

    function TimKiem($tukhoa, &$totalRows, $pageNum = 1, $pageSize = 5)
    {
        $startRows = ($pageNum - 1) * $pageSize;
        $tukhoa = $this->db->escape_string(trim(strip_tags($tukhoa)));
        $sql = "SELECT idTin,TieuDe, TomTat, urlHinh,Ngay,
        SoLanXem,Ten, TenTL, TieuDe_KhongDau, SoLanXem
        FROM tin,loaitin,theloai
        WHERE tin.AnHien=1 
        AND tin.idLT=loaitin.idLT
        AND tin.idTL=theloai.idTL
        AND (TieuDe RegExp '$tukhoa' or TomTat RegExp '$tukhoa')
        ORDER BY idTin DESC LIMIT $startRows,$pageSize";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);

        $sql = "SELECT count(*) 
        FROM tin,loaitin,theloai
        WHERE tin.AnHien=1 
        AND tin.idLT=loaitin.idLT
        AND tin.idTL=theloai.idTL
        AND (TieuDe RegExp '$tukhoa' or TomTat RegExp '$tukhoa')";
        $rs = $this->db->query($sql);
        if (!$rs) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        $row_rs = $rs->fetch_row();
        $totalRows = $row_rs[0];
        return $kq;
    } // end function TimKiem
    function getTitle($p = '')
    {
        if ($p == '') return "Tin Tức Tổng Hợp";
        elseif ($p == 'search') return "Tìm Kiếm Tin";
        elseif ($p == 'register') return "Đăng ký thành viên";
        elseif ($p == 'lienhe') return "Trang liên hệ";
        elseif ($p == 'detail') {
            $TieuDe_KhongDau = trim(strip_tags($_GET['TieuDe_KhongDau']));
            $TieuDe_KhongDau = $this->db->escape_string($TieuDe_KhongDau);
            $kq = $this->db->query("SELECT TieuDe
            FROM tin
            WHERE TieuDe_KhongDau='$TieuDe_KhongDau'");
            if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
            if ($kq->num_rows <= 0) return "Tin Tức Tổng Hợp";
            $row_kq = $kq->fetch_row();
            return $row_kq[0];
        } elseif ($p == 'cat') {
            $Ten_KhongDau = trim(strip_tags($_GET['Ten_KhongDau']));
            $Ten_KhongDau = $this->db->escape_string($Ten_KhongDau);
            $kq = $this->db->query("SELECT Ten 
            FROM loaitin 
            WHERE Ten_KhongDau='$Ten_KhongDau'");
            if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
            if ($kq->num_rows <= 0) return "Tin Tức Tổng Hợp";
            $row_kq = $kq->fetch_row();
            return $row_kq[0];
        } elseif ($p == 'tags') {
            $TenTag_KhongDau = trim(strip_tags($_GET['TenTag_KhongDau']));
            $TenTag_KhongDau = $this->db->escape_string($TenTag_KhongDau);
            $kq = $this->db->query("SELECT TenTag 
            FROM tags 
            WHERE TenTag_KhongDau='$TenTag_KhongDau'");
            if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
            if ($kq->num_rows <= 0) return "Tin Tức Tổng Hợp";
            $row_kq = $kq->fetch_row();
            return $row_kq[0];
        }
    } //end function getTitle
    //end phần public cơ bản
    function LayidTin($TieuDe_KhongDau)
    {
        $TieuDe_KhongDau = trim(strip_tags($_GET['TieuDe_KhongDau']));
        $TieuDe_KhongDau = $this->db->escape_string($TieuDe_KhongDau);
        $sql = "SELECT idTin 
        FROM tin 
        WHERE TieuDe_KhongDau='$TieuDe_KhongDau' ";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        $row_kq = $kq->fetch_assoc();
        return $row_kq['idTin'];
    } //end function LayidTin
    function LayidLT($Ten_KhongDau)
    {
        $Ten_KhongDau = trim(strip_tags($_GET['Ten_KhongDau']));
        $Ten_KhongDau = $this->db->escape_string($Ten_KhongDau);
        $sql = "SELECT idLT
        FROM loaitin 
        WHERE Ten_KhongDau='$Ten_KhongDau' ";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        $row_kq = $kq->fetch_assoc();
        $idLT = $row_kq['idLT'];
        return $idLT;
    } //end function LayidTin



    //end htaccess
    //===============================================

    function LayTenTags($idTag)
    {
        $sql = "SELECT TenTag
            FROM tags
            WHERE idTag=$idTag";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        if ($kq->num_rows <= 0)  return "";
        $row = $kq->fetch_row();
        $tenTag = $row[0];
        return $tenTag;
    } //end function LayTenTags

    function LayidTag($TenTag_KhongDau)
    {
        $TenTag_KhongDau = trim(strip_tags($_GET['TenTag_KhongDau']));
        $TenTag_KhongDau = $this->db->escape_string($TenTag_KhongDau);
        $sql = "SELECT idTag
        FROM tags 
        WHERE TenTag_KhongDau='$TenTag_KhongDau' ";
        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        $row_kq = $kq->fetch_assoc();
        $idTag = $row_kq['idTag'];
        return $idTag;
    } //end function LayidTag

    function TinTrongTags($idTag, $pageNum, $pageSize, &$totalRows)
    {
        $startRows = ($pageNum - 1) * $pageSize;
        $sql = "SELECT tin.*
        FROM tin, tags
        WHERE tin.tags=tags.TenTag
        AND idTag= $idTag 
        AND tin.AnHien=1
        ORDER BY idTin DESC
        LIMIT $startRows,$pageSize"; // chi lay vai record

        $kq = $this->db->query($sql);
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);

        // dem so record, 2 cau lenh phai giong nhau phan FROM va` WHERE
        $sql = "SELECT count(*) 
        FROM tin,tags 
        WHERE tin.tags=tags.TenTag
        AND idTag=$idTag
        AND tin.AnHien =1 ";
        $rs = $this->db->query($sql);
        $row_rs = $rs->fetch_row();
        $totalRows = $row_rs[0];
        if (!$kq) die('Lỗi trong hàm' . __FUNCTION__ . '' . $this->db->error);
        return $kq;
    } //end function TinTrongTags
    //end TinTrongTags.php

    function GuiMail($to, $from, $from_name, $subject, $body, $username, $password, &$error)
    {
        $error = "";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/news/PHPMailer-master/class.phpmailer.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/news/PHPMailer-master/class.smtp.php";
        try {
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;  //  1=errors and messages, 2=messages only
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->Username = $username;
            $mail->Password = $password;
            $mail->SetFrom($from, $from_name);
            $mail->Subject = $subject;
            $mail->MsgHTML($body); // noi dung chinh cua mail
            $mail->addAddress($to);
            $mail->CharSet = "utf-8";
            $mail->IsHTML(true);
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            if (!$mail->Send()) {
                $error = 'Lỗi:' . $mail->ErrorInfo;
                return false;
            } else {
                $error = '';
                return true;
            }
        } catch (phpmailerException $e) {
            echo "<pre>" . $e->errorMessage();
        }
    } // end function GuiMail

}//tin
