<?php

declare(strict_types=1);

namespace DogCare\Medicine\Domain;

use DogCare\Shared\Domain\Aggregate\AggregateRoot;
use DogCare\Shared\Domain\ValueObject\CreatedAt;
use DogCare\Shared\Domain\ValueObject\DeletedAt;
use DogCare\Shared\Domain\ValueObject\UpdatedAt;
use DogCare\Shared\Domain\ValueObject\Uuid;

final class Medicine extends AggregateRoot
{
    public static function primitiveName(): string
    {
        return 'medicine';
    }

    public static function create(
        string $id,
        string $name,
        ?string $description,
    ): self {
        return new self(
            new MedicineId($id),
            new MedicineName($name),
            $description ? new MedicineDescription($description) : null,
        );
    }

    public static function fromPrimitives(array $data): Medicine
    {
        return new Medicine(
            new MedicineId($data[MedicineId::primitiveName()]),
            new MedicineName($data[MedicineName::primitiveName()]),
            isset($data[MedicineDescription::primitiveName()])
                ? new MedicineDescription($data[MedicineDescription::primitiveName()])
                : null,
            new CreatedAt($data[CreatedAt::primitiveName()]),
            isset($data[UpdatedAt::primitiveName()])
                ? new UpdatedAt($data[UpdatedAt::primitiveName()])
                : null,
            isset($data[DeletedAt::primitiveName()])
                ? new DeletedAt($data[DeletedAt::primitiveName()])
                : null,
        );
    }

    public function toPrimitives(): array
    {
        return [
            MedicineId::primitiveName() => $this->id->value(),
            MedicineName::primitiveName() => $this->name->value(),
            MedicineDescription::primitiveName() => $this->description?->value(),
            CreatedAt::primitiveName() => $this->createdAt->value(),
            UpdatedAt::primitiveName() => $this->updatedAt?->value(),
            DeletedAt::primitiveName() => $this->deletedAt?->value(),
        ];
    }

    public function __construct(
        private readonly MedicineId $id,
        private MedicineName $name,
        private ?MedicineDescription $description,
        private readonly CreatedAt $createdAt = new CreatedAt(),
        private ?UpdatedAt $updatedAt = null,
        private ?DeletedAt $deletedAt = null,
    ) {
    }

    public function id(): MedicineId
    {
        return $this->id;
    }

    public function name(): MedicineName
    {
        return $this->name;
    }

    public function description(): ?MedicineDescription
    {
        return $this->description;
    }

    public function createdAt(): CreatedAt
    {
        return $this->createdAt;
    }

    public function updatedAt(): ?UpdatedAt
    {
        return $this->updatedAt;
    }

    public function deletedAt(): ?DeletedAt
    {
        return $this->deletedAt;
    }

    public function updateName(MedicineName $name): void
    {
        if (!$this->name->equals($name)) {
            $this->name = $name;
            $this->updatedAt = new UpdatedAt();
        }
    }

    public function updateDescription(?MedicineDescription $description): void
    {
        if ($this->description?->equals($description) || $this->description === $description) {
            return;
        }

        $this->description = $description;
        $this->updatedAt = new UpdatedAt();
    }

    public function save(MedicineRepository $repository): void
    {
        $repository->save($this);
    }

    public function delete(MedicineRepository $repository): void
    {
        $this->deletedAt = new DeletedAt();
        $repository->save($this);
    }
}
